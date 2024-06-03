<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardResponden extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel questionnaires
        $titleKuisioner = DB::table('questionnaires')->get();

        // Mengirimkan data ke view 'includes.sidebar'
        return view('layouts.defaultAdmin', compact('titleKuisioner'));
    }
}
