<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\userModel;
use App\guruModel;
use App\mapelModel;
use Illuminate\Support\Facades\Session; 

class GuruController extends Controller
{
    public function pengguna_guru(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('user')
                    ->where(['level_user' => 'G'])
                    ->leftJoin('guru', 'user.id', '=', 'guru.id_user')
                    ->select('guru.id', 'guru.id_user','guru.nip', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp')
                    ->get();

            $mapel = DB::table('mapel')
                ->leftJoin('kelas', 'mapel.id_kelas', '=' ,'kelas.id')
                ->select('mapel.id', 'kelas.nama_kelas', 'mapel.nama_mapel', 'mapel.id_guru')
                ->orderBy('kelas.nama_kelas', 'ASC')
                ->get();

            $search = Session::get('search_guru');
            if($search == 'all'){
                $search = '';
            }
            $session = '';

            if(Session::get('level') == 'A'){
                $session = 'Admin';
            }else if (Session::get('level') == 'G') {
                $session = 'Guru';
            }else if(Session::get('level') == 'S'){
                $session = 'Siswa';
            }

            return view('pengguna/guru/guru', compact('data', 'search', 'mapel', 'session'));
        }
    }

    public function tambah_guru()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $mapel = DB::table('mapel')
                    ->leftJoin('kelas', 'mapel.id_kelas', '=' ,'kelas.id')
                    ->select('mapel.id', 'kelas.nama_kelas', 'mapel.nama_mapel', 'mapel.id_guru')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->get();

            $session = '';

            if(Session::get('level') == 'A'){
                $session = 'Admin';
            }else if (Session::get('level') == 'G') {
                $session = 'Guru';
            }else if(Session::get('level') == 'S'){
                $session = 'Siswa';
            }

            return view('pengguna/guru/tambahguru', compact('mapel', 'session'));
        }
    }

    public function tambah_guruPost(Request $request){
        $data = new userModel();
        $data_guru = new guruModel();

        $id = uniqid();
        $id_guru = uniqid();

        // upload foto

        $file = $request->file('image');
        if($file != ''){
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912)."_guru.".$ext;
            $file->move('assets/images/foto/guru',$newName);
            $data->foto = $newName;
        }

        $data->id = $id;
        $data->nama = $request->nama;
        $data_guru->nip = $request->nip;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->telp = $request->notelp;
        $data->tempat_lahir = $request->temp_lahir;

        $date = date('Y-m-d');
        $date = $request->tanggallahir;

        $data->tanggal_lahir = $date;
        $data->alamat = $request->alamat;
        $data->password = bcrypt($request->password);
        $data->level_user = 'G';

        $data_guru->id = $id_guru;
        $data_guru->id_user = $id;

        if($request->mapel != null){
            foreach ($request->mapel as $map) {
                $mapel = mapelModel::findOrFail($map);
                $mapel->id_guru = $id_guru;

                $mapel->save();
            }
        }
        Session::put('search_guru', 'all');

        $data->save();
        $data_guru->save();
        return redirect()->route('pengguna.guru')->with('alert-success','Data berhasil ditambahkan!');
    }

    public function edit_guru($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $guru = DB::table('guru')
                    ->where(['id' => $id])
                    ->first();
            $guru1 = userModel::findOrFail($guru->id_user);

            $mapel = DB::table('mapel')
                    ->leftJoin('kelas', 'mapel.id_kelas', '=' ,'kelas.id')
                    ->select('mapel.id', 'kelas.nama_kelas', 'mapel.nama_mapel', 'mapel.id_guru')
                    ->orderBy('kelas.nama_kelas', 'ASC')
                    ->get();

            $session = '';

            if(Session::get('level') == 'A'){
                $session = 'Admin';
            }else if (Session::get('level') == 'G') {
                $session = 'Guru';
            }else if(Session::get('level') == 'S'){
                $session = 'Siswa';
            }

            return view('pengguna/guru/editguru', compact('guru', 'guru1', 'mapel', 'id', 'session'));
        }
    }

    public function edit_guruPost($id, Request $request){
        $data_guru = guruModel::where(['id' => $id])->first();
        $data = userModel::where(['id' => $data_guru->id_user])->first();

        $mpl = mapelModel::where(['id_guru' => $id])->get();

        $file = $request->file('image');
        if($file != ''){
            File::delete('assets/images/foto/guru/'.$data->foto);
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912)."_guru.".$ext;
            $file->move('assets/images/foto/guru',$newName);
            $data->foto = $newName;
        }

        $data->nama = $request->nama;
        $data_guru->nip = $request->nip;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->telp = $request->notelp;
        $data->tempat_lahir = $request->temp_lahir;

        $date = date('Y-m-d');
        $date = $request->tanggallahir;

        $data->tanggal_lahir = $date;
        $data->alamat = $request->alamat;
        if($request->password != null)
        {
            $data->password = bcrypt($request->password);
        }

        //set mapel
        foreach ($mpl as $m) {
            $m->id_guru = null;
            $m->save();
        }
        if($request->mapel != null){
            foreach ($request->mapel as $m) {
                $map = mapelModel::findOrFail($m);
                $map->id_guru = $id;
                $map->save();
           }
        }

        Session::put('search_guru', 'all');

        $data->save();
        $data_guru->save();
        return redirect()->route('pengguna.guru')->with('alert-success', 'Berhasil diperbaharui');
    }

    public function detail_guru($id_pengguna)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('user')
                ->where(['user.id' => $id_pengguna])
                ->leftJoin('guru', 'user.id', '=', 'guru.id_user')
                ->select('guru.id', 'guru.id_user', 'user.foto' , 'user.tanggal_lahir', 'user.tempat_lahir' ,'guru.nip', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp', 'user.alamat', 'user.username')
                ->first();
            $mapel = DB::table('mapel')
                    ->where(['id_guru' => $data->id])
                    ->leftJoin('kelas', 'mapel.id_kelas', '=' ,'kelas.id')
                    ->select('mapel.id', 'kelas.nama_kelas', 'mapel.nama_mapel', 'mapel.id_guru')
                    ->get();

            $session = '';

            if(Session::get('level') == 'A'){
                $session = 'Admin';
            }else if (Session::get('level') == 'G') {
                $session = 'Guru';
            }else if(Session::get('level') == 'S'){
                $session = 'Siswa';
            }

            return view('pengguna/guru/detailguru', compact('data', 'mapel', 'session'));
        }
    }

    public function hapus_guru($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data_guru = guruModel::findOrFail($id);
            $data = userModel::findOrFail($data_guru->id_user);

            $data->delete();
            $data_guru->delete();
            return redirect()->route('pengguna.guru')->with('alert-success','Berhasil dihapus!');;
        }
    }
}
