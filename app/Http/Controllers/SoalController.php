<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\soalModel;
use App\mapelModel;
use Illuminate\Support\Facades\Session;	

class SoalController extends Controller
{
    public function tambah_soal($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $mapel = mapelModel::findOrFail($id);

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }


            return view('master/soal/tambahsoal', compact('mapel', 'session'));
        }
    }

    public function tambah_soalPost($id, Request $request)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $soal = new soalModel();

            $soal->id_mapel = $id;
            $soal->soal = $request->soal;
            $soal->kunci = $request->kunci;
            $soal->jawab_a = $request->pila;
            $soal->jawab_b = $request->pilb;
            $soal->jawab_c = $request->pilc;
            $soal->jawab_d = $request->pild;
            $soal->jawab_e = $request->pile;

            $soal->save();

            return redirect()->route('detail.mapel.soal', $id)->with('alert-success', 'Soal berhasil ditambahkan');
        }
    }

    public function detail_soal($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $soal = soalModel::findOrFail($id);

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }


            return view('master/soal/detailsoal', compact('soal', 'session'));
        }
    }

    public function edit_soal($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $soal = soalModel::findOrFail($id);

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }


            return view('master/soal/editsoal', compact('soal', 'session'));
        }
    }

    public function edit_soalPost($id, Request $request){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $soal = soalModel::findOrFail($id);

            $soal->soal = $request->soal;
            $soal->kunci = $request->kunci;
            $soal->jawab_a = $request->pila;
            $soal->jawab_b = $request->pilb;
            $soal->jawab_c = $request->pilc;
            $soal->jawab_d = $request->pild;
            $soal->jawab_e = $request->pile;

            $soal->save();

            return redirect()->route('detail.mapel.soal', $soal->id_mapel)->with('alert-success', 'Soal berhasil diperbaharui!');
        }
    }

    public function delete_soal($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $soal = soalModel::findOrFail($id);
            $id_pass = $soal->id_mapel;
            $soal->delete();

            return redirect()->route('detail.mapel.soal', $id_pass)->with('alert-success', 'Soal berhasil dihapus!');
        }
    }
}
