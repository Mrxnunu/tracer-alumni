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
        return view('dashboard.alumni.index', [
            'alumni' => UserAnswer::all()
        ]);
    }
}
