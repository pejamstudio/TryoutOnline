<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapelModel;
use App\soalModel;
use App\kelasModel;
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

            $session = '';

			if(Session::get('level') == 'A'){
                $data = $data->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama')
                        ->get();
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
                $data = $data
                        ->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama')
                        ->where(['mapel.id_guru' => Session::get('id-guru')])
                        ->get();
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
                $data = $data
                    ->leftJoin('kelas_siswa', 'kelas_siswa.id_kelas', '=', 'kelas.id')
                    ->select('mapel.id', 'mapel.nama_mapel', 'mapel.kkm', 'kelas.nama_kelas', 'user.nama')
                    ->where(['kelas_siswa.id_siswa' => Session::get('id-siswa')])->get();
		        $session = 'Siswa';
		    }
            $cek_kelas = true;
            if(count(kelasModel::all()) == count($data))
            {
                $cek_kelas = false;
            }

            return view('master/mapel/mapel', compact('data', 'cek_kelas', 'session'));
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
            $data = mapelModel::findOrFail($id);
            $kelas = kelasModel::all();
            $mapel = mapelModel::all();
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
                    $data1->save();
                }
                $data->delete();
            }
            else
            {
                $data->nama_mapel = $request->mapel;
                $data->deskripsi = $request->deskripsi;
                $data->kkm = $request->kkm;
                $data->durasi = $request->durasi;
                $data->jumlah_soal = $request->jumlah_soal;
                $data->save();
            }

            return redirect()->route('master.mapel')->with('alert-success', 'Data berhasil diperbaharui!');
        }
    }

    public function delete_mapel($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = mapelModel::find($id);
            $data->delete();

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
            $mapel = mapelModel::findOrFail($id);
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
}
