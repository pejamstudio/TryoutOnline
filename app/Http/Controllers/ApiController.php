<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\guruModel;
use App\userModel;

class ApiController extends Controller
{

    public function read_guru()
    {
    	$data = DB::table('user')
                ->where(['level_user' => 'G'])
                ->leftJoin('guru', 'user.id', '=', 'guru.id_user')
                ->select('guru.id_user','guru.nip', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp', 'user.alamat', 'user.tanggal_lahir', 
            		'user.tempat_lahir', 'user.username', 'guru.id_mapel')
                ->get();
        $data_response["guru"] = $data;
        $data_response["response"] = 1;

        return response()->json($data_response);
    }

    public function create_guru(Request $request)
    {
        $data = new userModel();
        $data_guru = new guruModel();

        $id = uniqid();

        // upload foto

        $file = $request->file('image');
        if($file != ''){
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912)."_guru.".$ext;
            $file->move('assets/images/foto/guru',$newName);
            $data->foto = $newName;
        }

        $data->id = $id;
        $data->nama = $request->nama;
        $data_guru->nip = $request->nip;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->telp = $request->notelp;
        $data->tempat_lahir = $request->tempat_lahir;

        $date = date('Y-m-d');
        $date = $request->tanggal_lahir;

        $data->tanggal_lahir = $date;
        $data->alamat = $request->alamat;
        $data_guru->id_mapel = $request->id_mapel;
        $data->password = bcrypt($request->password);
        $data->level_user = 'G';

        $data_guru->id_user = $id;
        $dat['guru'] = $data->save();
        $dat['guru'] = $data_guru->save();

        return response()->json($dat);
    }

    public function profil_guru(Request $request)
    {
        $data = DB::table('user')
                ->where(['user.id' => $request->id])
                ->leftJoin('guru', 'user.id', '=', 'guru.id_user')
                ->select('guru.id', 'guru.id_user', 'user.foto' , 'user.tanggal_lahir', 'user.tempat_lahir' ,'guru.nip', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp', 'user.alamat', 'user.username')
                ->first();
        $mapel = DB::table('mapel')
                ->where(['id_guru' => $data->id])
                ->leftJoin('kelas', 'mapel.id_kelas', '=' ,'kelas.id')
                ->select('mapel.id', 'kelas.nama_kelas', 'mapel.nama_mapel', 'mapel.id_guru')
                ->get();

        $data_response['data'] = $data;
        $data_response['mapel_guru'] = $mapel;
        $data_response["response"] = 1;
        $data_response["message"] = 'berhasil diload';

        return response()->json($data_response);
    }

    public function profil_siswa(Request $request)
    {
        $data = DB::table('user')
            ->leftJoin('siswa', 'siswa.id_user', '=', 'user.id')
            ->leftJoin('kelas_siswa', 'kelas_siswa.id_siswa', '=', 'siswa.id')
            ->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
            ->select('user.id', 'user.foto', 'user.nama', 'siswa.nisn', 'user.jenis_kelamin', 'user.email', 'user.username', 'user.telp', 'user.tempat_lahir', 'user.tanggal_lahir', 'user.alamat', 'user.password', 'kelas.id_jurusan', 'kelas_siswa.id_kelas', 'jurusan.nama_jurusan', 'kelas.nama_kelas')
            ->where(['user.id' => $request->id])
            ->first();

        $data_response['data'] = $data;
        $data_response["response"] = 1;
        $data_response["message"] = 'berhasil diload';

        return response()->json($data_response);
    }

    public function load_siswa_where_guru(Request $request)
    {
        $data = DB::table('kelas_siswa')
                ->leftJoin('kelas', 'kelas.id', '=', 'kelas_siswa.id_kelas')
                ->leftJoin('mapel', 'mapel.id_kelas', '=', 'kelas.id')
                ->leftJoin('siswa', 'siswa.id', '=', 'kelas_siswa.id_siswa')
                ->leftJoin('user', 'user.id', '=', 'siswa.id_user')
                ->leftJoin('guru', 'guru.id', '=', 'mapel.id_guru')
                ->leftJoin('user AS user_guru', 'user_guru.id', '=', 'guru.id_user')
                ->select('siswa.id_user','siswa.nisn', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp', 'user.alamat', 'user.tanggal_lahir', 
                    'user.tempat_lahir', 'user.username', 'kelas.nama_kelas')
                ->where(['user_guru.id' => $request->id])
                ->get();
        $data_response['siswa'] = $data;
        $data_response["response"] = 1;
        $data_response["message"] = 'berhasil diload';

        return response()->json($data_response);
    }

    public function load_nilai_where_guru(Request $request)
    {
        $data = DB::table('nilai')
            ->leftJoin('siswa', 'nilai.id_siswa', '=', 'siswa.id')
            ->leftJoin('user AS Siswa', 'siswa.id_user', '=', 'Siswa.id')
            ->leftJoin('guru', 'nilai.id_guru', '=', 'guru.id')
            ->leftJoin('user AS Guru', 'guru.id_user', '=', 'Guru.id')
            ->leftJoin('mapel', 'mapel.id', '=', 'nilai.id_mapel')
            ->select('siswa.nisn', 'Siswa.nama', 'Siswa.email', 'Siswa.jenis_kelamin', 'Siswa.telp','Siswa.alamat', 'Siswa.tanggal_lahir', 'Siswa.tempat_lahir', 'Siswa.username', 'Guru.nama', 'Guru.id', 'mapel.nama_mapel', 'nilai.nilai')
            ->where(['Guru.id' => $request->id])
            ->get();

        $data_response['siswa'] = $data;
        $data_response["response"] = 1;
        $data_response["message"] = 'berhasil diload';

        return response()->json($data_response);
    }
}
