<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userModel;
use App\siswaModel;
use App\kelasModel;
use App\jurusanModel;
use App\siswakelasModel;
use Illuminate\Support\Facades\Session;	
use DB;

class SiswaController extends Controller
{
    public function pengguna_siswa()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('kelas_siswa')
                    ->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
                    ->leftJoin('siswa', 'siswa.id', '=', 'kelas_siswa.id_siswa')
                    ->leftJoin('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
                    ->leftJoin('user', 'user.id', '=', 'siswa.id_user');
            $search = Session::get('search_kelas');
            if($search == 'all'){
                $search = '';
            }

            $session = '';

			if(Session::get('level') == 'A'){
                $data = $data->select('kelas_siswa.id', 'siswa.id_user','kelas.nama_kelas', 'jurusan.nama_jurusan', 'siswa.nisn', 'user.nama', 'user.telp')
                    ->get();
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
                $data = $data->leftJoin('mapel', 'kelas_siswa.id_kelas', '=', 'mapel.id_kelas')
                            ->select('kelas_siswa.id', 'siswa.id_user','kelas.nama_kelas', 'jurusan.nama_jurusan', 'siswa.nisn', 'user.nama', 'user.telp')
                            ->where(['mapel.id_guru' => Session::get('id-guru')])
                            ->get();
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('pengguna/siswa/siswa', compact('data', 'search', 'session'));
        }
    }

    public function tambah_siswa(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $jurusan = jurusanModel::all();
            $kelas = kelasModel::all();

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('pengguna/siswa/tambahsiswa', compact('jurusan', 'kelas', 'session'));
        }
    }

    public function tambah_siswaPost(Request $request){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = new userModel();
            $data_siswa = new siswaModel();
            $data_kelas_siswa = new siswakelasModel();

            $id = uniqid();

            // upload foto

            $file = $request->file('image');
            if($file != ''){
                $ext = $file->getClientOriginalExtension();
                $newName = rand(100000,1001238912)."_siswa.".$ext;
                $file->move('assets/images/foto/siswa',$newName);
                $data->foto = $newName;
            }

            $data->id = $id;
            $data->nama = $request->nama;
            $data_siswa->nisn = $request->nisn;
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
            $data->level_user = 'S';

            $data_siswa->id_user = $id;
            $data->save();
            $data_siswa->save();

            $siswa = siswaModel::where(['id_user' => $id])->first();

            $data_kelas_siswa->id_kelas = $request->kelas;
            $data_kelas_siswa->id_siswa = $siswa->id;

            $data_kelas_siswa->save();

            return redirect()->route('pengguna.siswa.siswa')->with('alert-success','Data berhasil ditambahkan!');
        }
    }

    public function edit_siswa($id){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('kelas_siswa')
                    ->where(['kelas_siswa.id' =>$id])
                    ->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
                    ->leftJoin('siswa', 'siswa.id', '=', 'kelas_siswa.id_siswa')
                    ->leftJoin('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
                    ->leftJoin('user', 'user.id', '=', 'siswa.id_user')
                    ->select('kelas_siswa.id', 'user.foto', 'user.nama', 'siswa.nisn', 'user.jenis_kelamin', 'user.email', 'user.username', 'user.telp', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.alamat', 'user.password', 'kelas.id_jurusan', 'kelas_siswa.id_kelas')
                    ->first();
            $jurusan = jurusanModel::all();
            $kelas = kelasModel::all();

            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('pengguna/siswa/editsiswa', compact('data', 'jurusan', 'kelas', 'session'));
        }
    }

    public function edit_siswaPost($id, Request $request)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $siswa_kelas = siswakelasModel::findOrFail($id);
            $siswa = siswaModel::findOrFail($siswa_kelas->id_siswa);
            $user = userModel::findOrFail($siswa->id_user);

            $comment = '';
            $file = $request->file('image');
            if($file != ''){
                $ext = $file->getClientOriginalExtension();
                $newName = rand(100000,1001238912)."_guru.".$ext;
                $file->move('assets/images/foto/guru',$newName);
                $user->foto = $newName;
                $comment = 'Data berhasil diubah!';
            }
            else{
                $comment = 'gagal';
            }

            $user->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->telp = $request->notelp;
            $user->tempat_lahir = $request->temp_lahir;

            $date = date('Y-m-d');
            $date = $request->tanggallahir;

            $user->tanggal_lahir = $date;
            $user->alamat = $request->alamat;
            $siswa_kelas->id_kelas = $request->kelas;

            $user->save();
            $siswa->save();
            $siswa_kelas->save();
            return redirect()->route('pengguna.siswa.siswa')->with('alert-success',$comment);
        }
    }

    public function detail_siswa($id_pengguna){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data = DB::table('kelas_siswa')
                    ->where(['kelas_siswa.id' => $id_pengguna])
                    ->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
                    ->leftJoin('siswa', 'siswa.id', '=', 'kelas_siswa.id_siswa')
                    ->leftJoin('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
                    ->leftJoin('user', 'user.id', '=', 'siswa.id_user')
                    ->select('kelas_siswa.id', 'user.foto', 'user.nama', 'siswa.nisn', 'user.jenis_kelamin', 'user.email', 'user.username', 'user.telp', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.alamat', 'user.password', 'kelas.id_jurusan', 'kelas_siswa.id_kelas', 'jurusan.nama_jurusan', 'kelas.nama_kelas')
                    ->first();
            $session = '';

			if(Session::get('level') == 'A'){
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		        $session = 'Siswa';
		    }

            return view('pengguna/siswa/detailsiswa', compact('data', 'session'));
        }
    }

    public function hapus_siswa($id)
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $siswa_kelas = siswakelasModel::findOrFail($id);
            $siswa = siswaModel::findOrFail($siswa_kelas->id_siswa);
            $user = userModel::findOrFail($siswa->id_user);

            $siswa_kelas->delete();
            $siswa->delete();
            $user->delete();

            return redirect()->route('pengguna.siswa.siswa')->with('alert-success','Berhasil dihapus!');;
        }
    }
}
