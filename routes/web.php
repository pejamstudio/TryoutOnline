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
//login
Route::get('/', "LoginController@login")->name('login');
Route::post('/login', "LoginController@loginPost");
Route::get('/resetpassword', "LoginController@lupa_password")->name('lupapassword');
Route::post('/reset', "LoginController@lupa_passwordPost");
Route::get('/logout', "LoginController@logout");
Route::get('/dashboard', "LoginController@index")->name('dashboard');

// jurusan
Route::name('master.jurusan.')->prefix('master/jurusan')->group(function(){
	Route::get('/', "JurusanController@master_jurusan")->name('jurusan');
	Route::get('tambah', "JurusanController@tambah_jurusan")->name('tambah');
	Route::get('edit-{id}', "JurusanController@edit_jurusan")->name('edit');
});
Route::post('tambahjurusan', "JurusanController@tambah_jurusanPost");
Route::post('editjurusan/{id}', "JurusanController@edit_jurusanPost");
Route::post('hapusjurusan/{id}', "JurusanController@delete_jurusan");
Route::get('detailjurusan/{id}', "JurusanController@detail_jurusan");

// kelas
Route::prefix('master')->name('master.kelas.')->group(function(){
	Route::get('kelas', "KelasController@master_kelas")->name('kelas');
	Route::get('kelas/tambah', "KelasController@tambah_kelas")->name('tambah');
	Route::post('tambahkelas', "KelasController@tambah_kelasPost");
	Route::get('kelas/edit-{id}', "KelasController@edit_kelas")->name('edit');
	Route::post('editkelas/{idd}', "KelasController@edit_kelasPost");
	Route::post('hapuskelas/{idd}', "KelasController@delete_kelas");
	Route::get('detailkelas/{search}', "KelasController@detail_kelas");
});

// guru
Route::prefix('pengguna/guru')->name('pengguna.')->group(function(){
	Route::get('/', "GuruController@pengguna_guru")->name('guru');
	Route::get('tambah', "GuruController@tambah_guru")->name('guru.tambah');
	Route::get('edit/{id}', "GuruController@edit_guru")->name('guru.edit');
	Route::get('detail/{id}', "GuruController@detail_guru")->name('guru.detail');
});
Route::post('tambahguru', "GuruController@tambah_guruPost");
Route::post('editguru/{id}', "GuruController@edit_guruPost");
Route::post('hapusguru/{id}', "GuruController@hapus_guru");

// siswa
Route::prefix('pengguna/siswa')->name('pengguna.siswa.')->group(function(){
	Route::get('/', "SiswaController@pengguna_siswa")->name('siswa');
	Route::get('tambah', "SiswaController@tambah_siswa")->name('tambah');
	Route::get('edit-{id}', "SiswaController@edit_siswa")->name('edit');
	Route::get('detail-{id}', "SiswaController@detail_siswa")->name('detail');
});
Route::post('tambahsiswa', "SiswaController@tambah_siswaPost");
Route::post('editsiswa/{id}', "SiswaController@edit_siswaPost");
Route::post('hapussiswa/{id}', "SiswaController@hapus_siswa");

// mapel
Route::prefix('master')->group(function(){
	Route::get('mapel', "MapelController@master_mapel")->name('master.mapel');
	Route::get('mapel/tambah', "MapelController@tambah_mapel")->name('master.mapel.tambah');
	Route::get('mapel/edit/{id}', "MapelController@edit_mapel");
	Route::get('detailmapel/{id}', "MapelController@detail_mapel");
	Route::get('mapel/datasoal/{id}', "MapelController@detail_mapel_soal")->name('detail.mapel.soal');
});
Route::prefix('mapel')->group(function(){
	Route::post('tambah', "MapelController@tambah_mapelPost");
	Route::post('edit/{id}', "MapelController@edit_mapelPost");
	Route::post('hapus/{id}', "MapelController@delete_mapel");
	Route::post('setjadwal/{id}', "MapelController@set_jadwal");
});

//soal
Route::prefix('master')->group(function(){
	Route::get('mapel/datasoal/tambah/{id}', "SoalController@tambah_soal")->name('master.soal.tambah');
	Route::post('tambahsoal/{id}', "SoalController@tambah_soalPost");
	Route::get('mapel/datasoal/detail/{id}', "SoalController@detail_soal");
	Route::get('mapel/datasoal/edit/{id}', "SoalController@edit_soal");
	Route::post('editsoal/{id}', "SoalController@edit_soalPost");
	Route::post('hapussoal/{id}', "SoalController@delete_soal");
});

//nilai
Route::prefix('nilai')->group(function(){
	Route::get('/', "NilaiController@nilai")->name('nilai');	
	Route::get('detail/{id}', "NilaiController@detail_nilai");
});
Route::get('ceknilai/{id}', "NilaiController@cek_nilai");

//tryout
Route::prefix('tryout')->group(function(){
	Route::get('/', "TryoutController@tryout")->name('tryout');
	Route::post('kerjakan', "TryoutController@kerjakan_tryout")->name('kerjakan.tryout');
});
Route::post('submit/{id}', "TryoutController@submit");

//profil
Route::prefix('profil')->group(function(){
	Route::get('/', "ProfilController@profil")->name('profil');
	Route::get('edit', "ProfilController@edit_profil")->name('profil.edit');
});
Route::post('editprofil', "ProfilController@edit_profilPost")->name('editprofil');

//setjadwal
Route::get('setjadwal', "LoginController@setjadwal")->name('setjadwal');

//tambah mapel oleh guru
Route::post('tambahmapelguru', "MapelController@tambah_mapel_guru")->name('tambahmapelguru');
