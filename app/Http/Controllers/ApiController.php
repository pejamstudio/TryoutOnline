<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        return $data;
    }
}
