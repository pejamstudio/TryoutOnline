<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class NilaiController extends Controller
{
    public function nilai()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('nilai')
                    ->leftJoin('mapel', 'nilai.id_mapel', '=', 'mapel.id')
                    ->leftJoin('kelas', 'mapel.id_kelas', '=', 'kelas.id')
                    ->leftJoin('siswa', 'nilai.id_siswa', '=', 'siswa.id')
                    ->leftJoin('user AS user_siswa', 'user_siswa.id', '=', 'siswa.id_user')
                    ->leftJoin('guru', 'nilai.id_guru', '=', 'guru.id')
                    ->leftJoin('user AS user_guru', 'user_guru.id', '=', 'guru.id_user')
                    ->select('nilai.id','mapel.nama_mapel', 'siswa.nisn', 'guru.nip', 'nilai.nilai', 'user_siswa.nama AS nama_siswa', 'user_guru.nama AS nama_guru', 'kelas.nama_kelas');
            $search = Session::get('search_nilai');
            if($search == 'all'){
                $search = '';
            }

            $session = '';

			if(Session::get('level') == 'A'){
                $data = $data->get();
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
                $data = $data
                        ->where(['guru.id' => Session::get('id-guru')])
                        ->get();
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
                $data = $data
                        ->where(['siswa.id' => Session::get('id-siswa'), 'kelas.id' => Session::get('id-kelas')])
                        ->get();
		        $session = 'Siswa';
		    }

            return view('nilai/nilai', compact('data', 'search', 'session'));
        }
    }

    public function cek_nilai($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            Session::put('search_nilai', $id);

            return redirect()->route('nilai');
        }
    }

    public function detail_nilai($id)
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

            $nilai = DB::table('nilai')
                    ->where(['nilai.id' => $id])
                    ->leftJoin('mapel', 'mapel.id', '=', 'nilai.id_mapel')
                    ->select('mapel.nama_mapel', 'nilai.nilai', 'mapel.jumlah_soal', 'mapel.kkm')
                    ->first();
            $soal = DB::table('soal')
                    ->leftJoin('siswa_jawab', 'soal.id', '=', 'siswa_jawab.id_soal')
                    ->leftJoin('mapel', 'mapel.id', '=', 'soal.id_mapel')
                    ->leftJoin('nilai', 'nilai.id_mapel', '=', 'mapel.id')
                    ->select('soal.soal', 'soal.jawab_a', 'soal.jawab_b', 'soal.jawab_c', 'soal.jawab_d', 'soal.jawab_e', 'soal.kunci', 'siswa_jawab.jawab')
                    ->groupBy('soal.id')
                    ->where(['nilai.id' => $id])
                    ->get();
            $jumlah_benar = 0;
            foreach ($soal as $i => $s) {
                if($s->kunci == $s->jawab)
                {
                    $jumlah_benar++;
                }
            }


            return view('nilai/detailnilai', compact('nilai', 'session','soal', 'jumlah_benar'));
        }
    }
}
