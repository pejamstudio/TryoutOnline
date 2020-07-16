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
}
