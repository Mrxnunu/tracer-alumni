<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TracerAlumniController extends Controller
{
    //
    public function show()
    {
        return view('traceralumni.home', [
            "title" => "Beranda"
        ]);
    }
    public function contact()
    {
        return view('traceralumni.kontak', [
            "title" => "Kontak"
        ]);
    }
}
