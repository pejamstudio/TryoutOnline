<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusanModel;
use DB;
use View;	
use Illuminate\Support\Facades\Session;	

class JurusanController extends Controller
{
    public function master_jurusan(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('jurusan')->get();
            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('master/jurusan/jurusan', compact('data', 'session'));
        }
	}
    
    public function tambah_jurusan(){
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

            return view('master/jurusan/tambahjurusan', compact('session'));
        }
    }

    public function tambah_jurusanPost(Request $request)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{

            $data = jurusanModel::all();
            $data1 = new jurusanModel();

            $data1->nama_jurusan = $request->jurusan;
            $data1->save();

            return redirect()->route('master.jurusan.jurusan')->with('alert-success', 'Berhasil ditambahkan');
        }
    }

    public function edit_jurusan($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = jurusanModel::where(['id' => $id])->first();

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('master/jurusan/editjurusan', compact('data', 'session'));
        }
    }

    public function edit_jurusanPost($id, Request $request)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = jurusanModel::all();
            $data1 = jurusanModel::findOrFail($id);

            $data1->nama_jurusan = $request->nama;
            $data1->save();

            return redirect()->route('master.jurusan.jurusan')->with('alert-success', 'Berhasil diperbaharui!');
        }
        
    }

    public function delete_jurusan($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            jurusanModel::find($id)->delete();

            return redirect()->route('master.jurusan.jurusan')->with('alert-success', 'Berhasil dihapus!');
        }
    }

    public function detail_jurusan($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            Session::put('nama_jurusan', $id);

            return redirect()->route('master.kelas.kelas');
        }
    }
}
