<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAlumniController extends Controller
{
    public function index()
    {
        // return view('dashboard.alumni.index', [
        //     'alumni' => DB::select(DB::raw('SELECT DISTINCT nama, email, npm FROM user_answers'))
        // ]);

        // $dataAlumni = DB::table('user_answers')
        //     ->select('nama', 'email', 'npm', 'prodi', 'tahun_lulus')
        //     ->distinct()
        //     ->get();
        $query = DB::table('user_answers')
            ->select('nama', 'email', 'npm', 'prodi', 'tahun_lulus')
            ->distinct();

        // dd($query->toSql());

        $dataAlumni = $query->get();
        return view('dashboard.alumni.index', compact('dataAlumni'));
    }

    public function show($npm)
    {
        $query = DB::table('user_answers')
            ->where('npm', $npm);

        // dd($query->toSql());

        $alumni = $query->first();

        $jawabanQuery = DB::table('user_answers')
            ->where('npm', $npm);

        // dd($jawabanQuery->toSql());

        $jawaban = $jawabanQuery->get();

        return view('dashboard.alumni.show', compact('alumni', 'jawaban'));
    }
}
