<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Post;
use App\Models\Questionnaire;
use App\Models\tbl_info_loker;
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
        $questionnaires = Questionnaire::select(
            'id',
            'title',
            'description',
            'active'
        )
            ->withCount(['questions as responden' => function ($query) {
                $query->select(DB::raw('count(distinct nama)'))
                    ->join('user_answers', 'questions.id', '=', 'user_answers.question_id');
            }])
            ->where('active', 1)->get();
        // total kuisioner yang telah dilakukan
        // $kuis =  Answer::count();

        // Total Loker
        $totalLoker = tbl_info_loker::count();

        //

        return view('dashboard.index', compact('artikel', 'dataAlumni', 'questionnaires', 'totalLoker'));
    }
}
