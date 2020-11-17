<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelasModel;
use App\jurusanModel;
use Illuminate\Support\Facades\Session;	
use DB;

class KelasController extends Controller
{
    public function master_kelas(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('kelas')
                    ->leftJoin('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
                    ->select('kelas.id','kelas.nama_kelas', 'jurusan.nama_jurusan')
                    ->get();
            $id = Session::get('nama_jurusan');
            if($id == 'all'){
                $id = '';
            }

            $session = '';

    		if(Session::get('level') == 'A'){
            	$session = 'Admin';
    	    }else if (Session::get('level') == 'G') {
    	        $session = 'Guru';
    	    }else if(Session::get('level') == 'S'){
    	        $session = 'Siswa';
    	    }

            return view('master/kelas/kelas', compact('data', 'id', 'session'));
        }
    }

    public function tambah_kelas(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = jurusanModel::all();
            $id = Session::get('nama_jurusan');

            $session = '';

    		if(Session::get('level') == 'A'){
            	$session = 'Admin';
    	    }else if (Session::get('level') == 'G') {
    	        $session = 'Guru';
    	    }else if(Session::get('level') == 'S'){
    	        $session = 'Siswa';
    	    }

            return view('master/kelas/tambahkelas', compact('data','id', 'session'));
        }
        
    }

    public function tambah_kelasPost(Request $request){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data_tambah = new kelasModel();
            $data_tambah->id_jurusan = $request->jurusan;
            $data_tambah->nama_kelas = $request->namakelas;

            $data_tambah->save();

            return redirect()->route('master.kelas.kelas')->with('alert-success', 'Berhasil ditambahkan!');
        }
    }

    public function edit_kelas($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = kelasModel::findOrFail($id);
            $jurusan = jurusanModel::findOrFail($data->id_jurusan);
            $data1 = jurusanModel::all();
            $id = Session::get('nama_jurusan');

            $session = '';

    		if(Session::get('level') == 'A'){
            	$session = 'Admin';
    	    }else if (Session::get('level') == 'G') {
    	        $session = 'Guru';
    	    }else if(Session::get('level') == 'S'){
    	        $session = 'Siswa';
    	    }

            return view('master/kelas/editkelas', compact('data', 'jurusan' ,'data1', 'id', 'session'));
        }
    }

    public function edit_kelasPost($idd, Request $request){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $kelas = kelasModel::findOrFail($idd);
            $kelas->nama_kelas = $request->namakelas;
            $kelas->id_jurusan = $request->jurusan;
            $kelas->save();

            return redirect()->route('master.kelas.kelas')->with('alert-success', 'Berhasil diupdate!');
        }
    }

    public function delete_kelas($idd){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            kelasModel::find($idd)->delete();

            return redirect()->route('master.kelas.kelas')->with('alert-success', 'Berhasil dihapus!');
        }
    }

    public function detail_kelas($search){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            Session::put('search_kelas', $search);

            return redirect()->route('pengguna.siswa.siswa');
        }
    }
}
