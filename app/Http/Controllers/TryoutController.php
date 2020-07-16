<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapelModel;
use App\soalModel;
use App\siswajawabModel;
use App\nilaiModel;
use DB;
use Illuminate\Support\Facades\Session;	

class TryoutController extends Controller
{
    public function tryout()
    {
    	if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = mapelModel::findOrFail(19);
            $cek = nilaiModel::where(['id_mapel' => 19]);

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

    		return view('tryout/tryout', compact('data', 'cek', 'session'));
        }
    }

    public function kerjakan_tryout()
    {
    	if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $mapel = mapelModel::findOrFail(19);
            $soal = soalModel::where(['id_mapel' => $mapel->id])->get();
            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }
    		return view('tryout/kerjakantryout', compact('mapel', 'soal', 'session'));
        }
    }

    public function submit($id, Request $request)
    {
    	$siswa = Session::get('id-siswa');
    	$mapel = mapelModel::findOrFail($id);
    	$soal = soalModel::where(['id_mapel' => $id])->get();
    	$benar = 0;
    	foreach ($soal as $i => $s) {
    		$data = new siswajawabModel();

    		$data->id_siswa = $siswa;
    		$data->id_soal = $s->id;
    		$data->jawab = $request->jawab[$i];
    		if($s->kunci == $request->jawab[$i])
    		{
    			$benar++;
    		}
    		$data->save();
    	}

    	$nilai_akhir = $benar / count($soal) * 100;
    	$nilai = new nilaiModel();

    	$nilai->id_siswa = $siswa;
    	$nilai->id_mapel = $id;
    	$nilai->id_guru = $mapel->id_guru;
    	$nilai->nilai = $nilai_akhir;

    	$nilai->save();

    	return redirect()->route('tryout');
    }
}
