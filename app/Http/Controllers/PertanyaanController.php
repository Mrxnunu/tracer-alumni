<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        // $parameters = Parameter::latest()->get();
        // return view('pertanyaan', compact('parameters'));
        $parameters = Parameter::with(['topik', 'periode'])->latest()->get();
        return view('pertanyaan', compact('parameters'));
    }
}
