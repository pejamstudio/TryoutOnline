<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapelModel;
use App\soalModel;
use App\kelasModel;
use App\jadwalModel;
use App\nilaiModel;
use App\userModel;
use Illuminate\Support\Facades\Session;	
use DB;

class MapelController extends Controller
{
    public function master_mapel(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('mapel')
                    ->leftJoin('guru', 'guru.id', '=', 'mapel.id_guru')
                    ->leftJoin('user', 'user.id', '=', 'guru.id_user')
                    ->leftJoin('kelas', 'kelas.id', '=', 'mapel.id_kelas');
            $mapel = DB::table('mapel')
                    ->leftJoin('guru', 'guru.id', '=', 'mapel.id_guru')
                    ->leftJoin('user', 'user.id', '=', 'guru.id_user')
                    ->leftJoin('kelas', 'kelas.id', '=', 'mapel.id_kelas')
                    ->leftJoin('jadwal', 'jadwal.id_mapel', '=', 'mapel.id')
                    ->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama', 'jadwal.tanggal', 'jadwal.waktu')
                    ->orderBy('kelas.nama_kelas', 'ASC');

            $session = '';

			if(Session::get('level') == 'A'){
                $data = $data->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama')
                        ->groupBy('nama_mapel')
                        ->get();
                $mapel = $mapel->get();
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
                $data = $data
                        ->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama')
                        ->where(['mapel.id_guru' => Session::get('id-guru')])
                        ->groupBy('nama_mapel')
                        ->get();
                $mapel = $mapel
                        ->where(['mapel.id_guru' => Session::get('id-guru')])
                        ->get();
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
                $data = $data
                    ->leftJoin('kelas_siswa', 'kelas_siswa.id_kelas', '=', 'kelas.id')
                    ->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama')
                    ->where(['kelas_siswa.id_siswa' => Session::get('id-siswa')])->get();
                $mapel = $mapel
                        ->leftJoin('kelas_siswa', 'kelas_siswa.id_kelas', '=', 'kelas.id')
                        ->where(['kelas_siswa.id_siswa' => Session::get('id-siswa')])->get();
		        $session = 'Siswa';
		    }
            // $cek_kelas = true;
            // if(count(kelasModel::all()) == count($data))
            // {
            //     $cek_kelas = false;
            // }
            $mapel_guru = DB::table('mapel')
                        ->leftJoin('kelas', 'mapel.id_kelas', '=', 'kelas.id')
                        ->select('mapel.id', 'mapel.nama_mapel', 'kelas.nama_kelas')
                        ->where(['id_guru' => null])
                        ->get();

            return view('master/mapel/mapel', compact('data', 'session', 'mapel', 'mapel_guru'));
        }
    }
    
    public function tambah_mapel(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
        	$session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            $kelas = kelasModel::all();
            $mapel = mapelModel::all();

            $guru = DB::table('guru')
                    ->leftJoin('user', 'guru.id_user', '=', 'user.id')
                    ->select('guru.id', 'user.nama')
                    ->get();

            return view('master/mapel/tambahmapel', compact('kelas', 'mapel', 'guru', 'session'));
        }
    }

    public function tambah_mapelPost(Request $request){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{

            if($request->kelas != null)
            {
                foreach ($request->kelas as $k) {
                    $data = new mapelModel();
                    $data->nama_mapel = $request->mapel;
                    $data->deskripsi = $request->deskripsi;
                    $data->kkm = $request->kkm;
                    $data->durasi = $request->durasi;
                    $data->jumlah_soal = $request->jumlah_soal;
                    $data->id_kelas = $k;
                    $data->save();
                }
            }
            else
            {
                $data = new mapelModel();
                $data->nama_mapel = $request->mapel;
                $data->deskripsi = $request->deskripsi;
                $data->kkm = $request->kkm;
                $data->durasi = $request->durasi;
                $data->jumlah_soal = $request->jumlah_soal;
                $data->save();
            }

            return redirect()->route('master.mapel')->with('alert-success', 'Data berhasil ditambahkan!');
        }
    }

    public function edit_mapel($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = mapelModel::where(['id' => $id])->first();
            $kelas = kelasModel::groupBy('nama_kelas')->get();
            $mapel = DB::table('mapel')
                    ->where(['nama_mapel' => $data->nama_mapel])
                    ->get();
            $guru = DB::table('guru')
                    ->leftJoin('user', 'guru.id_user', '=', 'user.id')
                    ->select('guru.id', 'user.nama')
                    ->get();

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('master/mapel/editmapel', compact('data', 'kelas', 'mapel', 'guru', 'session'));
        }
    }

    public function edit_mapelPost($id, Request $request){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = mapelModel::findOrFail($id);

            //cari id kelas dan id mapel
            $km = mapelModel::where(['nama_mapel' => $data->nama_mapel])->get();

            if($request->kelas != null)
            {
                foreach ($request->kelas as $k) {
                    $data1 = new mapelModel();

                    $data1->nama_mapel = $request->mapel;
                    $data1->deskripsi = $request->deskripsi;
                    $data1->kkm = $request->kkm;
                    $data1->durasi = $request->durasi;
                    $data1->jumlah_soal = $request->jumlah_soal;
                    $data1->id_kelas = $k;

                    //cek guru
                    foreach ($km as $kl) {
                        if($kl->id_guru != null)
                        {
                            if($kl->id_kelas == $k)
                            {
                                $data1->id_guru = $kl->id_guru;
                            }
                        }
                    }  
                    $data1->save();
                }
                foreach ($km as $key) {
                    $key->delete();
                }
            }
            else
            {
                foreach ($km as $key) {
                    $key->delete();
                }
            }

            foreach ($km as $k) {
                //set soal dan nilai jika sudah terisi
                $soal_lama = soalModel::where(['id_mapel' => $k->id])->get();
                $nilai_lama = nilaiModel::where(['id_mapel' => $k->id])->get();

                $mapel_baru = mapelModel::where(['nama_mapel' => $k->nama_mapel, 'id_kelas' => $k->id_kelas])->first();
                foreach ($soal_lama as $sk) {
                    $sk->id_mapel = $mapel_baru->id;
                    $sk->save();
                }
                foreach ($nilai_lama as $n) {
                    $n->id_mapel = $mapel_baru->id;
                    $n->save();
                }
            }

            return redirect()->route('master.mapel')->with('alert-success', 'Data berhasil diperbaharui!');
        }
    }

    public function delete_mapel($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $km = mapelModel::where(['nama_mapel' => $data->nama_mapel])->get();
            $data = mapelModel::find($id);
            foreach ($km as $key) {
                $key->delete();
            }

            return redirect()->route('master.mapel')->with('alert-success', 'Data berhasil dihapus!');
        }
    }

    public function detail_mapel($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            Session::put('search_guru', $id);

            return redirect()->route('pengguna.guru');
        }
    }

    public function detail_mapel_soal($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $mapel = DB::table('mapel')
                    ->where(['mapel.id' => $id])
                    ->leftJoin('kelas', 'kelas.id', '=', 'mapel.id_kelas')
                    ->leftJoin('guru', 'guru.id', '=', 'mapel.id_guru')
                    ->leftJoin('user', 'user.id', '=', 'guru.id_user')
                    ->select('mapel.id','mapel.nama_mapel', 'mapel.deskripsi', 'kelas.nama_kelas', 'mapel.kkm', 'mapel.jumlah_soal', 'mapel.durasi', 'user.nama')
                    ->first();
            $soal = soalModel::where(['id_mapel' => $mapel->id])->get();

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('master/mapel/detailmapel', compact('mapel', 'soal', 'session'));
        }
    }

    public function set_jadwal($id, Request $request)
    {
        $cek_jad = jadwalModel::where(['id_mapel' => $id])->first();
        $jadwal = new jadwalModel();
        if($cek_jad != null)
        {
            $jadwal = $cek_jad;
        }

        $jadwal->id_mapel = $id;
        $date = date('Y-m-d');
        $date = $request->tanggal;

        $jadwal->tanggal = $date;

        $time = time('H:m');
        $time = $request->waktu;
        $jadwal->waktu = $time;

        $jadwal->save();

        return redirect()->route('master.mapel')->with('alert-success', 'Berhasil menambahkan jadwal');
    }

    public function tambah_mapel_guru(Request $request)
    {

        foreach ($request->mapelguru as $mg) {
            $mapel = mapelModel::where(['id' => $mg])->first();
            $mapel->id_guru = Session::get('id-guru');
            $mapel->save();
        }
        return redirect()->route('master.mapel')->with('alert-success', 'Berhasil menambahkan mata pelajaran');
    }
}
