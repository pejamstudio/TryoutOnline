<?php

use Illuminate\Http\Request;
use App\user;

Route::post('login_user', "ApiController@login");
Route::post('cek_level', "ApiController@cek_level");

Route::post('profil_guru', "ApiController@profil_guru");
Route::post('profil_siswa', "ApiController@profil_siswa");
Route::post('edit_profil_guru', "ApiController@edit_profil_guru");
Route::post('edit_profil_siswa', "ApiController@edit_profil_siswa");

Route::post('nilai_siswa',"ApiController@nilai_siswa");
Route::post('nilai_guru',"ApiController@nilai_guru");
Route::post('nilai_semua',"ApiController@nilai_semua");


Route::post('mapel_guru', "ApiController@mapel_guru");
Route::post('siswa_guru' , "ApiController@siswa_guru");

Route::get('dashboard' , "ApiController@dashboard");
Route::get('mapel_tersedia', "ApiController@mapel_tersedia");
Route::post('tambah_mapel_diajukan', "ApiController@tambah_mapel_diajukan");


Route::post('mapel_soal', "ApiController@mapel_soal");
Route::post('tambah_soal', "ApiController@tambah_soal");
Route::post('edit_soal', "ApiController@edit_soal");
Route::post('delete_soal',"ApiController@delete_soal");

Route::post('load_jadwal', "ApiController@load_jadwal");
Route::post('load_jadwal_guru', "ApiController@load_jadwal_guru");