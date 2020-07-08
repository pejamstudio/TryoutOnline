<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru_dashboard()
    {
        return view('guru/guru');
    }
    public function guru_datanilai()
    {
        return view('guru/datanilai');
    }
    public function guru_datasiswa()
    {
        return view('guru/datasiswa');
    }
    public function guru_datasoal()
    {
        return view('guru/datasoal');
    }
}
