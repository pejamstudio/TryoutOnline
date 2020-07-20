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
Route::get('master/jurusan', "JurusanController@master_jurusan")->name('master.jurusan.jurusan');
Route::get('master/jurusan/tambah', "JurusanController@tambah_jurusan")->name('master.jurusan.tambah');
Route::post('tambahjurusan', "JurusanController@tambah_jurusanPost");
Route::get('master/jurusan/edit-{id}', "JurusanController@edit_jurusan")->name('master.jurusan.edit');
Route::post('editjurusan/{id}', "JurusanController@edit_jurusanPost");
Route::post('hapusjurusan/{id}', "JurusanController@delete_jurusan");
Route::get('detailjurusan/{id}', "JurusanController@detail_jurusan");

// kelas
Route::get('master/kelas', "KelasController@master_kelas")->name('master.kelas.kelas');
Route::get('master/kelas/tambah', "KelasController@tambah_kelas")->name('master.kelas.tambah');
Route::post('master/tambahkelas', "KelasController@tambah_kelasPost");
Route::get('master/kelas/edit-{id}', "KelasController@edit_kelas")->name('master.kelas.edit');
Route::post('master/editkelas/{idd}', "KelasController@edit_kelasPost");
Route::post('master/hapuskelas/{idd}', "KelasController@delete_kelas");
Route::get('master/detailkelas/{search}', "KelasController@detail_kelas");

// guru
Route::get('pengguna/guru', "GuruController@pengguna_guru")->name('pengguna.guru');
Route::get('pengguna/guru/tambah', "GuruController@tambah_guru")->name('pengguna.guru.tambah');
Route::post('tambahguru', "GuruController@tambah_guruPost");
Route::get('pengguna/guru/edit/{id}', "GuruController@edit_guru")->name('pengguna.guru.edit');
Route::post('editguru/{id}', "GuruController@edit_guruPost");
Route::post('hapusguru/{id}', "GuruController@hapus_guru");
Route::get('pengguna/guru/detail/{id}', "GuruController@detail_guru")->name('pengguna.guru.detail');

// siswa
Route::get('pengguna/siswa', "SiswaController@pengguna_siswa")->name('pengguna.siswa.siswa');
Route::get('pengguna/siswa/tambah', "SiswaController@tambah_siswa")->name('pengguna.siswa.tambah');
Route::post('tambahsiswa', "SiswaController@tambah_siswaPost");
Route::get('pengguna/siswa/edit-{id}', "SiswaController@edit_siswa")->name('pengguna.siswa.edit');
Route::post('editsiswa/{id}', "SiswaController@edit_siswaPost");
Route::get('pengguna/siswa/detail-{id}', "SiswaController@detail_siswa")->name('pengguna.siswa.detail');
Route::post('hapussiswa/{id}', "SiswaController@hapus_siswa");

//mapel
Route::get('master/mapel', "MapelController@master_mapel")->name('master.mapel');
Route::get('master/mapel/tambah', "MapelController@tambah_mapel")->name('master.mapel.tambah');
Route::post('mapel/tambah', "MapelController@tambah_mapelPost");
Route::get('master/mapel/edit/{id}', "MapelController@edit_mapel");
Route::post('mapel/edit/{id}', "MapelController@edit_mapelPost");
Route::post('mapel/hapus/{id}', "MapelController@delete_mapel");
Route::get('master/detailmapel/{id}', "MapelController@detail_mapel");
Route::get('master/mapel/datasoal/{id}', "MapelController@detail_mapel_soal")->name('detail.mapel.soal');
Route::post('mapel/setjadwal/{id}', "MapelController@set_jadwal");

//soal
Route::get('master/mapel/datasoal/tambah/{id}', "SoalController@tambah_soal")->name('master.soal.tambah');
Route::post('master/tambahsoal/{id}', "SoalController@tambah_soalPost");
Route::get('master/mapel/datasoal/detail/{id}', "SoalController@detail_soal");
Route::get('master/mapel/datasoal/edit/{id}', "SoalController@edit_soal");
Route::post('master/editsoal/{id}', "SoalController@edit_soalPost");
Route::post('master/hapussoal/{id}', "SoalController@delete_soal");

//nilai
Route::get('nilai', "NilaiController@nilai")->name('nilai');
Route::get('ceknilai/{id}', "NilaiController@cek_nilai");
Route::get('nilai/detail/{id}', "NilaiController@detail_nilai");

//tryout
Route::get('tryout', "TryoutController@tryout")->name('tryout');
Route::get('tryout/kerjakan', "TryoutController@kerjakan_tryout")->name('kerjakan.tryout');
Route::post('submit/{id}', "TryoutController@submit");

//profil
Route::get('profil', "ProfilController@profil")->name('profil');
Route::get('profil/edit', "ProfilController@edit_profil")->name('profil.edit');
Route::post('editprofil', "ProfilController@edit_profilPost")->name('editprofil');

//setjadwal
Route::get('setjadwal', "LoginController@setjadwal");

//tambah mapel oleh guru
Route::post('tambahmapelguru', "MapelController@tambah_mapel_guru")->name('tambahmapelguru');
