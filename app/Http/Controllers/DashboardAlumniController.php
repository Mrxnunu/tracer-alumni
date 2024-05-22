<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAlumniController extends Controller
{
    public function index()
    {
        $namaAlumni = DB::select("select
                ua.answer_text ,
                q.question_text
            from
                user_answers ua
            join questions q  on ua.question_id = q.id
            where q.question_text = 'Nama Mahasiswa';");
        // $emailAlumni = DB::select("select
        // ua.answer_text ,
        // q.question_text
        // from
        //     user_answers ua
        // join questions q  on ua.question_id = q.id
        // where q.question_text = 'Email';");
        return view('dashboard.alumni.index', compact('namaAlumni'));
    }
}
