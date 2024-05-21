<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class DashboardPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Answer::select('answers.jawaban', 'parameters.parameter')
            ->join('parameters', 'answers.id_parameter', '=', 'parameters.id')
            ->where('parameters.parameter', 'Profil Perushaan')
            ->get();
        return view('dashboard.perusahaan.index', compact('perusahaan'));
    }
}
