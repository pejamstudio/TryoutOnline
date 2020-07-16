<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\userModel;
use App\guruModel;
use App\siswaModel;
use App\kelasModel;
use App\mapelModel;
use App\Mail\SendMail;
use DB;

class LoginController extends Controller
{


    public function index()
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

            $kelas = count(kelasModel::all());
            $mapel = count(mapelModel::all());
            $guru = count(guruModel::all());
            $siswa = count(siswaModel::all());
            
            return view('dashboard', compact('kelas', 'mapel', 'guru', 'siswa', 'session'));
        }
    }

    public function login(){
        if(!Session::get('login')){
            return view('login');
        }else{
            return redirect('/dashboard');
        }
    }

    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $dataDb = userModel::where(['username' => $request->username])->first();
        if($dataDb){
            if(Hash::check($password, $dataDb->password)){
                Session::put('name',$dataDb->nama);
                Session::put('login',TRUE);
                $data = $dataDb->level_user;
                Session::put('nama_pengguna', $dataDb->nama);
                Session::put('foto', $dataDb->foto);
                if($data == 'A'){
                    Session::put('level', 'A');
                    return redirect('/dashboard');
                }
                else if ($data == 'G') {
                    Session::put('level', 'G');
                    $id_guru = guruModel::where(['id_user' => $dataDb->id])->first();
                    Session::put('id-guru', $id_guru->id);
                    return redirect('/dashboard');
                }else if($data == 'S'){
                    Session::put('level', 'S');
                    $id_siswa = siswaModel::where(['id_user' => $dataDb->id])->first();
                    Session::put('id-siswa', $id_siswa->id);
                    $id_kelas = DB::table('kelas_siswa')
                                ->where(['id_siswa' => $id_siswa->id])
                                ->first();
                    Session::put('id-kelas', $id_kelas->id_kelas);
                    return redirect('/dashboard');
                }
            }
            else{
                return redirect('/')->with('alert','Password Salah!');
            }
        }
        else{
            return redirect('/')->with('alert','Username Salah!');
        }
    }

    public function lupa_password()
    {
        return view('lupapassword');
    }

    public function lupa_passwordPost(Request $request)
    {
        $data = userModel::where(['email' => $request->email])->first();
        if($data != null){
            $password = $data->nama.rand(10,100);
            $data_kirim = array(
                'name' => $data->nama,
                'message' => $password
            );

            $data->password = bcrypt($password);

            Mail::to($request->email)->send(new SendMail($data_kirim));
            $data->save();

            return redirect()->route('login')->with('alert-success', 'Password terkirim');
        }
        else{
            return redirect('/resetpassword')->with('alert', 'Pengguna tidak terdaftar');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('alert', 'Anda sudah logout!');
    }
}
