<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardIndexController extends Controller
{
    public function index()
    {
        // total alumni
        // $alumni = DB::table(DB::raw('(SELECT a.jawaban
        //             FROM answers a
        //             JOIN parameters p ON a.id_parameter = p.id
        //             WHERE p.parameter = "Nama Alumni") AS subquery'));

        // // total perusahaan
        // $perusahaan = DB::table(DB::raw('(SELECT a.jawaban
        //                             FROM answers a
        //                             JOIN parameters p ON a.id_parameter = p.id
        //                             WHERE p.parameter = "Profil Perushaan") AS subquery'))
        //     ->count();
        // total artikel
        $dataAlumni = DB::table('user_answers')
            ->select('nama', 'email', 'npm')
            ->distinct()
            ->get()
            ->count();
        $artikel = Post::count();

        // total kuisioner yang telah dilakukan
        // $kuis =  Answer::count();

        return view('dashboard.index', compact('artikel', 'dataAlumni'));
    }
}
