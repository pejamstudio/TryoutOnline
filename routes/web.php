<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('admin/dashboard', "AdminController@dashboard")->name('admin.dashboard');

Route::get('admin/pengguna/guru', "AdminController@pengguna_guru")->name('admin.pengguna.guru');
Route::get('pengguna/guru/tambah', "AdminController@tambah_guru")->name('pengguna.guru.tambah');
Route::get('pengguna/guru/edit', "AdminController@edit_guru")->name('pengguna.guru.edit');
Route::get('pengguna/guru/detail', "AdminController@detail_guru")->name('pengguna.guru.detail');

Route::get('admin/pengguna/siswa', "AdminController@pengguna_siswa")->name('admin.pengguna.siswa');
Route::get('pengguna/siswa/tambah', "AdminController@tambah_siswa")->name('pengguna.siswa.tambah');
Route::get('pengguna/siswa/edit', "AdminController@edit_siswa")->name('pengguna.siswa.edit');
Route::get('pengguna/siswa/detail', "AdminController@detail_siswa")->name('pengguna.siswa.detail');

Route::get('admin/master/jurusan', "AdminController@master_jurusan")->name('admin.master.jurusan');
Route::get('master/jurusan/tambah', "AdminController@tambah_jurusan")->name('master.jurusan.tambah');
Route::get('master/jurusan/edit', "AdminController@edit_jurusan")->name('master.jurusan.edit');

Route::get('admin/master/kelas', "AdminController@master_kelas")->name('admin.master.kelas');
Route::get('master/kelas/tambah', "AdminController@tambah_kelas")->name('master.kelas.tambah');
Route::get('master/kelas/edit', "AdminController@edit_kelas")->name('master.kelas.edit');

Route::get('admin/master/mapel', "AdminController@master_mapel")->name('admin.master.mapel');
Route::get('master/mapel/tambah', "AdminController@tambah_mapel")->name('master.mapel.tambah');
Route::get('master/mapel/edit', "AdminController@edit_mapel")->name('master.mapel.edit');


Route::get('guru/datanilai', "GuruController@guru_datanilai")->name('master.mapel.tambah');
Route::get('guru/dashboard', "GuruController@guru_dashboard")->name('master.mapel.edit');
Route::get('guru/datasoal', "GuruController@guru_datasoal")->name('master.mapel.edit');
Route::get('guru/datasiswa', "GuruController@guru_datasiswa")->name('master.mapel.edit');
