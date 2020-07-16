<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\userModel;
use App\siswaModel;
use App\guruModel;
use Illuminate\Support\Facades\Session;	

class ProfilController extends Controller
{
    public function profil()
    {
    	if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
        	$data = DB::table('user');

        	$session = '';

			if(Session::get('level') == 'A'){
				$data = $data->where(['level_user' => 'A'])->first();
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		    	$data = $data->where(['user.id' => Session::get('id-guru')])
		    			->leftJoin('guru', 'guru.id_user', '=', 'user.id')
		    			->select('user.nama', 'user.foto', 'guru.nip', 'user.jenis_kelamin', 'user.alamat', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.email', 'user.telp', 'user.username')
		    			->first();
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		    	$data = $data
		    			->leftJoin('siswa', 'siswa.id_user', '=', 'user.id')
		    			->leftJoin('kelas_siswa', 'kelas_siswa.id_siswa', '=', 'siswa.id')
		    			->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
		    			->select('user.nama', 'siswa.nisn', 'user.jenis_kelamin', 'user.alamat', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.email', 'user.telp', 'user.username','user.foto', 'kelas.nama_kelas')
		    			->where(['siswa.id' => Session::get('id-siswa')])
		    			->first();
		        $session = 'Siswa';
		    }

            return view('profil/profil', compact('data', 'session'));
        }
    }

    public function edit_profil()
    {
    	if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
        	$data = DB::table('user');

        	$session = '';

			if(Session::get('level') == 'A'){
				$data = $data->where(['level_user' => 'A'])->first();
	        	$session = 'Admin';
		    }else if (Session::get('level') == 'G') {
		    	$data = $data->where(['user.id' => Session::get('id-guru')])
		    			->leftJoin('guru', 'guru.id_user', '=', 'user.id')
		    			->select('user.nama', 'user.foto', 'guru.nip', 'user.jenis_kelamin', 'user.alamat', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.email', 'user.telp', 'user.username')
		    			->first();
		        $session = 'Guru';
		    }else if(Session::get('level') == 'S'){
		    	$data = $data
		    			->leftJoin('siswa', 'siswa.id_user', '=', 'user.id')
		    			->leftJoin('kelas_siswa', 'kelas_siswa.id_siswa', '=', 'siswa.id')
		    			->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
		    			->select('user.nama', 'siswa.nisn', 'user.jenis_kelamin', 'user.alamat', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.email', 'user.telp', 'user.username','user.foto', 'kelas.nama_kelas')
		    			->where(['siswa.id' => Session::get('id-siswa')])
		    			->first();
		        $session = 'Siswa';
		    }

            return view('profil/editprofil', compact('data', 'session'));
        }
    }

    public function edit_profilPost(Request $request)
    {
    	$data = '';
    		if(Session::get('level') == 'A'){
				$data = userModel::where(['level_user' => 'A'])->first();
		    }else if (Session::get('level') == 'G') {
		    	$data_guru = siswaModel::where(['id' => Session::get('id-guru')])->first();
		    	$data = userModel::where(['id' => $data_guru->id_user])->first();
		    	$data->jenis_kelamin = $request->jenis_kelamin;
		    	$data->tempat_lahir = $request->temp_lahir;

		        $date = date('Y-m-d');
		        $date = $request->tanggallahir;

		        $data->tanggal_lahir = $date;
		    }else if(Session::get('level') == 'S'){
		    	$data_siswa = siswaModel::where(['id' => Session::get('id-siswa')])->first();
		    	$data = userModel::where(['id' => $data_siswa->id_user])->first();
		    	$data->jenis_kelamin = $request->jenis_kelamin;
		    	$data->tempat_lahir = $request->temp_lahir;

		        $date = date('Y-m-d');
		        $date = $request->tanggallahir;

		        $data->tanggal_lahir = $date;
		    }
		$file = $request->file('image');
        if($file != ''){
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912)."_guru.".$ext;
            $file->move('assets/images/foto/guru',$newName);
            $data->foto = $newName;
        }
		$data->nama = $request->nama;
		$data->email = $request->email;
		$data->username = $request->username;
		$data->telp = $request->notelp;
		$data->alamat = $request->nama;
		if($request->password != null)
		{
			$data->password = bcrypt($request->password);
		}
		$data->save();

		return redirect()->route('profil')->with('alert-success', 'Berhasil diperbaharui');

    }
}
