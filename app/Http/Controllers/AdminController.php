<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userModel;
use App\guruModel;
use DB;

class AdminController extends Controller
{
    public function dashboard(){
		return view('admin/dashboard');
	}


	public function pengguna_guru()
    {

        $data = DB::table('user')
                ->where(['level_user' => 'G'])
                ->leftJoin('guru', 'user.id', '=', 'guru.id_user')
                ->select('guru.nip', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp')
                ->get();

        return view('admin/guru', compact('data'));
    }

    public function tambah_guru()
    {
    	return view('pengguna/guru/tambahguru');
    }

    public function tambah_guruPost(Request $request){
        $data = new userModel();
        $data_guru = new guruModel();

        $id = uniqid();

        // upload foto

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912)."_guru.".$ext;
        $file->move('assets/images/foto/guru',$newName);
        $data->foto = $newName;

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
        $data_guru->id_mapel = $request->matapelajaran;
        $data->password = bcrypt($request->password);
        $data->level_user = 'G';

        $data_guru->id_user = $id;
        $data->save();
        $data_guru->save();
        return redirect()->route('pengguna.guru.tambah')->with('alert-success','Data berhasil ditambahkan!');
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
    
}
