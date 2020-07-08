<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
		return view('admin/dashboard');
	}


	public function pengguna_guru()
    {
        return view('admin/guru');
    }
    public function tambah_guru()
    {
    	return view('pengguna/guru/tambahguru');
    }
    public function edit_guru(){
        return view('pengguna/guru/editguru');
    }
    public function detail_guru()
    {
        return view('pengguna/guru/detailguru');
    }


    public function pengguna_siswa()
    {
    	return view('admin/siswa');
    }

    public function tambah_siswa(){
        return view('pengguna/siswa/tambahsiswa');
    }

    public function edit_siswa(){
    	return view('pengguna/siswa/editsiswa');
    }

    public function detail_siswa(){
    	return view('pengguna/siswa/detailsiswa');
    }


	public function master_jurusan(){
		return view('admin/jurusan');
	}
    
    public function tambah_jurusan(){
        return view('master/jurusan/tambahjurusan');
    }

    public function edit_jurusan(){
        return view('master/jurusan/editjurusan');
    }


    public function master_kelas(){
        return view('admin/kelas');
    }
    
    public function tambah_kelas(){
        return view('master/kelas/tambahkelas');
    }

    public function edit_kelas(){
        return view('master/kelas/editkelas');
    }


    public function master_mapel(){
        return view('admin/mapel');
    }
    
    public function tambah_mapel(){
        return view('master/mapel/tambahmapel');
    }

    public function edit_mapel(){
        return view('master/mapel/editmapel');
    }
    
    public function master_paketsoal(){
        return view('admin/paketsoal');
    }
    public function tambah_paketsoal(){
        return view('master/soal/tambahpaketsoal');
    }
    public function edit_paketsoal(){
        return view('master/soal/editpaketsoal');
    }
    public function detail_paketsoal(){
        return view('master/soal/detailpaketsoal');
    }
    public function paketsoal_soal(){

    }
}
