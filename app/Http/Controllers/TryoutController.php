<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapelModel;
use App\soalModel;
use App\siswajawabModel;
use App\nilaiModel;
use App\jadwalModel;
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
            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            $data = DB::table('mapel')
                    ->leftJoin('kelas_siswa', 'kelas_siswa.id_kelas', '=', 'mapel.id_kelas')
                    ->leftJoin('jadwal', 'mapel.id', '=', 'jadwal.id_mapel')
                    ->select('mapel.id', 'mapel.nama_mapel', 'mapel.durasi', 'mapel.jumlah_soal', 'mapel.kkm', 'jadwal.tanggal', 'jadwal.waktu')
                    ->where(['kelas_siswa.id_siswa' => Session::get('id-siswa'), 'tanggal' => (date_format(date_create(), 'Y-m-d'))])
                    ->get();
            $cek = nilaiModel::where(['id_siswa' => Session::get('id-siswa')])->get();

            // $i = 0;
            // $data = DB::table('mapel');
            // foreach ($data1 as $d) {
                
            // }

    		return view('tryout/tryout', compact('data', 'cek', 'session'));
        }
    }

    public function kerjakan_tryout(Request $request)
    {
    	if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $mapel = mapelModel::findOrFail($request->id_mapel);
            $waktu = $request->waktu;
            $soal = soalModel::where(['id_mapel' => $mapel->id])->get();
            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }
    		return view('tryout/kerjakantryout', compact('mapel', 'soal', 'session', 'waktu'));
        }
    }

    public function submit($id, Request $request)
    {
    	$siswa = Session::get('id-siswa');
        $mapel = mapelModel::findOrFail($id);
        $soal = soalModel::where(['id_mapel' => $id])->get();
        $benar = 0;
        foreach ($request->jawab as $jb) {
            $data = new siswajawabModel();

            $data->id_siswa = $siswa;
            $jwb = explode(',', $jb);
            $data->id_soal = $jwb[1];
            $data->jawab = $jwb[0];
            $kunci = soalModel::where(['id' => $jwb[1]])->first();
            if($kunci->kunci == $jwb[0])
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
