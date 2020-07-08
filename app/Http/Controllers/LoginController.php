<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\userModel;

class LoginController extends Controller
{
    public function index()
    {
    	if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
        	if(Session::get('level') == 'A'){
        		return view('admin/dashboard');
        	}
        }
    }

    public function login(){
    	return view('/');
    }

    public function loginPost(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	$dataDb = userModel::where(['username' => $request->username])->first();
    	if($dataDb){
    		if(Hash::check($password, $dataDb->password)){
                Session::put('name',$dataDb->nama);
                Session::put('login',TRUE);
                if($dataDb->level_user == 'A'){
                	Session::put('level', 'A');
                	return redirect('admin/dashboard');
                }
                elseif ($dataDb->level_user == 'G') {
                	return redirect('guru/guru');
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

    public function logout(){
        Session::flush();
        return redirect('/')->with('alert', 'Anda sudah logout!');
    }
}
