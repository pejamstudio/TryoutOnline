<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\userModel;
use App\guruModel;
use App\soalModel;
use App\mapelModel;
use App\nilaiModel;
use App\siswajawabModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use DB;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $data = DB::table('user')
                ->where(['username' => $request->username])
                ->select('user.id','user.password','user.username', 'user.level_user')->first();
        if($data){
            if(Hash::check($request->password, $data->password))
            {
                $resp['response'] = true;
                $resp['level'] = $data->level_user;
                $resp['message'] = "Berhasil Login";
                $resp['id'] = $data->id;
                return response()->json($resp);
            }
            else{
                $resp['response'] = false;
                $resp['message'] = 'password salah';
                return response()->json($resp);
            }
        }
        else{
            $resp['response'] = false;
            $resp['message'] = 'username salah';
            return response()->json($resp);
        }
    }
    public function profil_siswa(Request $request){
        $data = DB::table('user')
                ->leftJoin('siswa', 'user.id', '=', 'siswa.id_user')
                ->leftJoin('kelas_siswa', 'siswa.id' ,'=', 'kelas_siswa.id_siswa')
                ->leftJoin('kelas', 'kelas_siswa.id_kelas', '=' ,'kelas.id')
                ->leftJoin('jurusan' , 'kelas.id_jurusan' ,'=','jurusan.id')
                ->select('siswa.id_user','siswa.nisn', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp', 'user.alamat', 'user.tanggal_lahir', 'user.tempat_lahir', 'user.username', 'user.foto' , 'kelas.nama_kelas  as kelas', 'jurusan.nama_jurusan as jurusan')
                ->where(['user.id' => $request->id])
                ->first();
       
        if($data){
            $resp ['id'] = $data->id_user;
            $resp ['nama'] = $data->nama;
            $resp ['jenkel'] = $data->jenis_kelamin;
            $resp ['tempat_lahir'] =$data->tempat_lahir; 
            $resp ['tanggal_lahir'] = $data->tanggal_lahir;
            $resp ['telp'] = $data->telp;
            $resp ['alamat'] = $data->alamat;
            $resp ['email'] = $data->email;
            $resp ['username'] = $data->username;
            $resp ['nisn'] = $data->nisn;
            $resp ['foto'] = $data->foto;
            $resp ['kelas'] = $data->kelas;
            $resp ['jurusan'] = $data->jurusan;
            return response()->json($resp);
        }else{
            $resp ['response'] = 0;
        }
    }

    public function profil_guru(Request $request){
        $data = DB::table('user')
                ->where(['user.id' => $request->id])
                ->leftJoin('guru', 'user.id', '=', 'guru.id_user')
                ->select('guru.id_user','guru.nip', 'user.nama', 'user.email', 'user.jenis_kelamin', 'user.telp', 'user.alamat', 'user.tanggal_lahir', 'user.tempat_lahir', 'user.username', 'user.foto')
                ->first();
       
        if($data){
            $resp ['id'] = $data->id_user;
            $resp ['nama'] = $data->nama;
            $resp ['jenkel'] = $data->jenis_kelamin;
            $resp ['tempat_lahir'] =$data->tempat_lahir; 
            $resp ['tanggal_lahir'] = $data->tanggal_lahir;
            $resp ['telp'] = $data->telp;
            $resp ['alamat'] = $data->alamat;
            $resp ['email'] = $data->email;
            $resp ['username'] = $data->username;
            $resp ['nip'] = $data->nip;
            $resp ['foto'] = $data->foto;

            return response()->json($resp);
        }
    }

    public function edit_profil_siswa(Request $request)
    {
        $data = userModel::where(['id' => $request->id])->first();

        $comment = '';
        $file = $request->file('image');
        if($file != ''){
            $image_path = 'assets/images/foto/siswa/'.$data->foto;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $ext = $file->getClientOriginalExtension();
            $newName =  rand(100000,1001238912)."_siswa.".$ext;
            $file->move('assets/images/foto/siswa',$newName);
            $data->foto = $newName;
            $comment = 'Data berhasil diubah!';
        }
        else{
            $comment = 'gagal';
        }

        $data->alamat = $request->input('alamat');  
        $data->telp = $request->input('telp');
        $data->nama = $request->input('nama');
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->tempat_lahir = $request->input('tempat_lahir');
        $data->tanggal_lahir = $request->input('tanggal_lahir');

        $data->save();
        $resp ['response'] = true;
        $resp ['message'] = "Profil Berhasil Diperbarui";
        return response()->json($resp);
    }
    
    public function edit_profil_guru(Request $request)
    {
        $data = userModel::where(['id' => $request->id])->first();

        $comment = '';
        $file = $request->file('image');
        if($file != ''){
            $image_path = 'assets/images/foto/guru/'.$data->foto;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $ext = $file->getClientOriginalExtension();
            $newName =  rand(100000,1001238912)."_guru.".$ext;
            $file->move('assets/images/foto/guru',$newName);
            $data->foto = $newName;
            $comment = 'Data berhasil diubah!';
        }
        else{
            $comment = 'gagal';
        }

        $data->alamat = $request->input('alamat');  
        $data->telp = $request->input('telp');
        $data->nama = $request->input('nama');
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->tempat_lahir = $request->input('tempat_lahir');
        $data->tanggal_lahir = $request->input('tanggal_lahir');

        $data->save();
        $resp ['response'] = true;
        $resp ['message'] = "Profil Berhasil Diperbarui";
        return response()->json($resp);
    }

    

    public function cek_level(Request $request){
        $data = DB::table('user')
                ->where(['id' => $request->id])
                ->select('user.id', 'user.level_user')->first();
        if($data){
            $resp ['response'] = true;
            $resp ['level'] = $data->level_user;
            $resp ['message'] = 'Pengguna Ditemukan';
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = 'Pengguna Tidak Ditemukan';
            return response()->json($resp);
        }
    }

    public function mapel_guru(Request $request){
        $data = DB::table('mapel')
                ->leftJoin('guru','mapel.id_guru','=','guru.id')
                ->leftJoin('user', 'guru.id_user', '=' ,'user.id')
                ->leftJoin('kelas', 'mapel.id_kelas', '=', 'kelas.id')
                ->where(['user.id' => $request->id])
                ->select('mapel.id', 'mapel.nama_mapel', 'mapel.deskripsi', 'mapel.kkm', 'mapel.durasi', 'user.nama AS nama_guru' ,'kelas.nama_kelas')
                ->orderBy('kelas.nama_kelas')
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = "berhasil load mapel";
            $resp ['mapel'] = $data;
            return response()->json($resp);
        }else{
            $resp ['responses'] = false;
            $resp ['message'] = "data kosong";
        return response()->json($resp);
        }
        
    }


    public function mapel_tersedia(){
        $data = DB::table('mapel')
                ->leftJoin('kelas', 'mapel.id_kelas' , '=', 'kelas.id')
                ->select('mapel.id' , 'mapel.nama_mapel', 'kelas.nama_kelas')
                ->where(['mapel.id_guru' => ""])
                ->orderBy('kelas.nama_kelas')
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = 'berhasil load data';
            $resp ['mapel'] = $data;
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = 'data kosong';
            return response()->json($resp);
        }
    }

    public function tambah_mapel_diajukan(Request $request){
        $data_guru = DB::table('user')
                    ->leftJoin('guru','user.id' ,'=','guru.id_user')
                    ->select('guru.id AS id_guru')
                    ->where(['user.id' => $request->id])
                    ->first();
        if($data_guru){
            $data = DB::table('mapel')->where(['id' => $request->id_mapel])
                    ->update(['id_guru' => $data_guru->id_guru]);
            $resp ['response'] = true;
            $resp ['message'] = "Mapel berhasil diajukan";
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = "Mapel gagal diajukan";
            return response()->json($resp);
        }
        $resp ['response'] = true;
        $resp ['message'] = "Mapel berhasil diajukan";
        return response()->json($resp);
    }


    public function nilai_siswa(Request $request){
        $data = DB::table('nilai')
                ->leftJoin('siswa','nilai.id_siswa','=','siswa.id')
                ->leftJoin('user','siswa.id_user','=','user.id')
                ->leftJoin('guru','nilai.id_guru','=','guru.id')
                ->leftJoin('user AS user_guru','guru.id_user','=','user_guru.id')
                ->leftJoin('mapel','nilai.id_mapel','=','mapel.id')
                ->leftJoin('kelas_siswa','nilai.id_siswa','=','kelas_siswa.id_siswa')
                ->leftJoin('kelas','kelas_siswa.id_kelas','=','kelas.id')
                ->leftJoin('jurusan','kelas.id_jurusan','=','jurusan.id')
                ->select('siswa.nisn','user.nama AS nama_siswa','jurusan.nama_jurusan', 'kelas.nama_kelas','mapel.nama_mapel','user_guru.nama AS nama_guru', 'nilai.nilai')
                ->where(['user.id' => $request->id])
                ->orderBy('mapel.id', 'ASC')
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = "berhasil load";
            $resp ['nilai'] = $data;
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = "data kosong";
            return response()->json($resp);
        }
        
    }

    public function nilai_guru(Request $request){
        $data = DB::table('nilai')
                ->leftJoin('siswa','nilai.id_siswa','=','siswa.id')
                ->leftJoin('user','siswa.id_user','=','user.id')
                ->leftJoin('guru','nilai.id_guru','=','guru.id')
                ->leftJoin('user AS user_guru','guru.id_user','=','user_guru.id')
                ->leftJoin('mapel','nilai.id_mapel','=','mapel.id')
                ->leftJoin('kelas_siswa','nilai.id_siswa','=','kelas_siswa.id_siswa')
                ->leftJoin('kelas','kelas_siswa.id_kelas','=','kelas.id')
                ->leftJoin('jurusan','kelas.id_jurusan','=','jurusan.id')
                ->select('siswa.nisn','user.nama AS nama_siswa','jurusan.nama_jurusan', 'kelas.nama_kelas','mapel.nama_mapel','user_guru.nama AS nama_guru', 'nilai.nilai')
                ->where(['user_guru.id' => $request->id, 'nilai.id_mapel' => $request->id_mapel])
                ->orderBy('mapel.id', 'ASC')
                ->orderBy('user.nama','ASC')
                ->orderBy('kelas.id','ASC')
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = "berhasil load";
            $resp ['nilai'] = $data;
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = "data kosong";
            return response()->json($resp);
        }
    }

    public function nilai_semua(){
        $data = DB::table('nilai')
                ->leftJoin('siswa','nilai.id_siswa','=','siswa.id')
                ->leftJoin('user','siswa.id_user','=','user.id')
                ->leftJoin('guru','nilai.id_guru','=','guru.id')
                ->leftJoin('user AS user_guru','guru.id_user','=','user_guru.id')
                ->leftJoin('mapel','nilai.id_mapel','=','mapel.id')
                ->leftJoin('kelas_siswa','nilai.id_siswa','=','kelas_siswa.id_siswa')
                ->leftJoin('kelas','kelas_siswa.id_kelas','=','kelas.id')
                ->leftJoin('jurusan','kelas.id_jurusan','=','jurusan.id')
                ->select('siswa.nisn','user.nama AS nama_siswa','jurusan.nama_jurusan', 'kelas.nama_kelas','mapel.nama_mapel','user_guru.nama AS nama_guru', 'nilai.nilai')
                ->orderBy('mapel.id', 'ASC')
                ->orderBy('user.nama','ASC')
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = "berhasil load";
            $resp ['data'] = $data;
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = "data kosong";
            return response()->json($resp);
        }
    }

    public function siswa_guru(Request $request){
        $data = DB::table('siswa')
                ->leftJoin('kelas_siswa','siswa.id','=','kelas_siswa.id_siswa')
                ->leftJoin('kelas','kelas_siswa.id_kelas','=','kelas.id')
                ->leftJoin('mapel','kelas.id','=','mapel.id_kelas')
                ->leftJoin('user','siswa.id_user','=','user.id')
                ->select('siswa.nisn','user.nama','user.foto', 'user.jenis_kelamin','user.telp','user.alamat','user.tempat_lahir','user.tanggal_lahir','user.email', 'kelas.nama_kelas')
                ->where(['mapel.id'=> $request->id_mapel])
                ->orderBy('user.nama','ASC')
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = 'berhasil load siswa';
            $resp ['siswa'] = $data;
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = 'data kosong';
            return response()->json($resp);
        }
    }

    public function dashboard(){
        $jum_kelas = DB::table('kelas')->get()->count();
        $jum_siswa = DB::table('siswa')->get()->count();
        $jum_guru = DB::table('guru')->get()->count();
        $jum_mapel = DB::table('mapel')->select('nama_mapel')->groupBy('nama_mapel')->get()->count();        
        $resp ['response'] = true;
        $resp ['message'] = 'behasil load';
        $resp ['jumlah_kelas'] = $jum_kelas;
        $resp ['jumlah_siswa'] = $jum_siswa;
        $resp ['jumlah_guru'] = $jum_guru;
        $resp ['jumlah_mapel'] = $jum_mapel;
        return response()->json($resp);
    }

    


    public function mapel_soal(Request $request){
        $data = DB::table('soal')
                ->leftJoin('mapel', 'soal.id_mapel' , '=','mapel.id')
                ->select('soal.id', 'soal.soal', 'soal.jawab_a', 'soal.jawab_b' , 'soal.jawab_c' ,'soal.jawab_d', 'soal.jawab_e' , 'soal.kunci')
                ->where(['mapel.id' => $request->id_mapel])
                ->get();
        if($data->count() != 0){
            $resp ['response'] = true;
            $resp ['message'] = "data soal berhasil di load";
            $resp ['soal'] = $data;
            return response()->json($resp);
        }else{
            $resp ['response'] = false;
            $resp ['message'] = "Data soal kosong";
            return response()->json($resp);

        }
    }

    public function tambah_soal(Request $request){
        $soal = new soalModel();
        $soal->id_mapel = $request->id_mapel;
        $soal->soal = $request->soal;
        $soal->kunci = $request->kunci;
        $soal->jawab_a = $request->pila;
        $soal->jawab_b = $request->pilb;
        $soal->jawab_c = $request->pilc;
        $soal->jawab_d = $request->pild;
        $soal->jawab_e = $request->pile;

        $soal->save();

        $resp ['response'] = true;
        $resp ['message'] = "Data soal berhasi ditambahkan";
        return response()->json($resp);
    }

    public function edit_soal(Request $request){
        $soal = soalModel::where(['id' => $request->id_soal])->first();


        $soal->soal = $request->soal;
        $soal->kunci = $request->kunci;
        $soal->jawab_a = $request->pila;
        $soal->jawab_b = $request->pilb;
        $soal->jawab_c = $request->pilc;
        $soal->jawab_d = $request->pild;
        $soal->jawab_e = $request->pile;

        $soal->save();

        $resp ['response'] = true;
        $resp ['message'] = "Data soal berhasi diperbarui";
        return response()->json($resp);
    }

    public function delete_soal(Request $request){
        $soal = soalModel::findOrFail($request->id_soal);
        $soal->delete();
        $resp ['response'] = true;
        $resp ['message'] = "Data soal terhapus";
        return response()->json($resp);
    }

    

    public function load_jadwal_guru(Request $request){
        $data = DB::table('jadwal')
                ->leftJoin('mapel','jadwal.id_mapel','=','mapel.id')
                ->leftJoin('kelas','mapel.id_kelas','=','kelas.id')
                ->leftJoin('guru','mapel.id_guru','=','guru.id')
                ->leftJoin('user','guru.id_user','=','user.id')
                ->select('mapel.nama_mapel','kelas.nama_kelas','jadwal.waktu','jadwal.tanggal')
                ->where(['user.id'=>$request->id])
                 ->whereRaw('jadwal.tanggal >= CURDATE() AND jadwal.tanggal <= DATE_SUB(CURDATE(), INTERVAL -1 MONTH)')
                ->get();
        if($data->count() != 0){
            $resp ["response"] = true;
            $resp ["message"] = 'Load jadwal berhasil';
            $resp ['jadwal'] = $data;
            return response()->json($resp);
        }else{
            $resp ["response"] = false;
            $resp ["message"] = 'Data kosong';
            return response()->json($resp);
        }

    }

    public function siswa_jawab(Request $request)
    {
        $data = DB::table('user')
                ->leftJoin('siswa' , 'user.id' ,'=','siswa.id_user')
                ->select('siswa.id as id_siswa')
                ->where(['user.id' => $request->id])
                ->first();

        $siswa = $data->id_siswa;
        $mapel = mapelModel::findOrFail($request->id_mapel);
        $soal = soalModel::where(['id_mapel' => $request->id_mapel])->get();
        $benar = 0;
        foreach ($request->jawab as $jb) {
            if($jb != ""){

                $data = new siswajawabModel();

                $data->id_siswa = $siswa;
                $jwb = explode(',', $jb);
                $data->id_soal = $jwb[0];
                $data->jawab = $jwb[1];
                $kunci = soalModel::where(['id' => $jwb[0]])->first();
                if($kunci->kunci == $jwb[1])
                {
                    $benar++;
                }
                $data->save();
            
            }
        }

        $nilai_akhir = $benar / count($soal) * 100;
        $nilai = new nilaiModel();

        $nilai->id_siswa = $siswa;
        $nilai->id_mapel = $request->id_mapel;
        $nilai->id_guru = $mapel->id_guru;
        $nilai->nilai = $nilai_akhir;

        $nilai->save();

        $resp['jawab'] = $request->jawab;
        $resp['response'] = true;
        $resp['message'] = "berhasil";
        return response()->json($resp);
    }

    public function load_jadwal(Request $request)
    {
        $data = DB::table('jadwal')
                ->leftJoin('mapel', 'mapel.id', '=', 'jadwal.id_mapel')
                ->leftJoin('kelas_siswa','mapel.id_kelas','=','kelas_siswa.id_kelas')
                ->leftJoin('kelas','kelas_siswa.id_kelas','=','kelas.id')
                ->leftJoin('siswa', 'kelas_siswa.id_siswa' ,'=','siswa.id')
                ->leftJoin('user', 'siswa.id_user','=','user.id')
                ->leftJoin('nilai' , 'mapel.id' , '=', 'nilai.id_mapel')
                ->select('jadwal.waktu', 'jadwal.tanggal', 'mapel.nama_mapel AS mapel', 'mapel.id AS id_mapel', 'kelas.nama_kelas AS kelas', 'user.id', 'mapel.durasi' , 'nilai.nilai')
                ->where(['user.id' => $request->id])
                ->get();
        $data_response["response"] = true;
        $data_response["message"] = 'berhasil diload';
        $data_response['jadwal'] = $data;

        return response()->json($data_response);
    }

    public function load_soal(Request $request)
    {
        $data = DB::table('soal')
                ->leftJoin('mapel', 'mapel.id', '=', 'soal.id_mapel')
                ->leftJoin('kelas_siswa', 'kelas_siswa.id_kelas', '=', 'mapel.id_kelas')
                ->leftJoin('siswa', 'siswa.id', '=', 'kelas_siswa.id_siswa')
                ->leftJoin('user', 'user.id', '=', 'siswa.id_user')
                ->select('soal.id','soal.id_mapel', 'soal.soal', 'soal.jawab_a', 'soal.jawab_b', 'soal.jawab_c', 'soal.jawab_d', 'soal.jawab_e', 
                    'soal.kunci')
                ->where(['mapel.id' => $request->id_mapel, 'user.id' => $request->id])
                ->get();

        $data_response['soal'] = $data;
        $data_response["response"] = true;
        $data_response["message"] = 'berhasil diload';

        return response()->json($data_response);
    }
}
