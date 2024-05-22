<?php

namespace App\Http\Controllers;

use App\Models\tbl_mahasiswa_answer;
use Illuminate\Http\Request;

class Formanswermhs extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'npm'     => 'required|max:255',
            'nama'     => 'required|max:255',
            'email'   => 'required|email:dns',
            'nohp'   => 'required',
            'pekerjaan'   => 'required',
            'nama_perusahaan'   => 'required',
            'alamat_perusahaan'   => 'required'
        ]);

        tbl_mahasiswa_answer::create($validateData);
        return redirect('/pertanyaan');
    }
}
