<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Parameter;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    public function index()
    {
        // return view('pertanyaan');
        $questionnaire = Questionnaire::with('questions.answers')->where('active', true)->latest()->first();
        // $questionnaire = Questionnaire::with('questions.answers')->latest()->first();

        // Pass the questionnaire to the view
        return view('pertanyaan', compact('questionnaire'));
    }

    // public function store(Request $request)
    // {

    //     return redirect('/pertanyaan')->with('success', 'Jawaban Sudah Terkirim');
    // }

    public function submit(Request $request, $id)
    {
        // return $request;
        $questionnaire = Questionnaire::with('questions')->findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:user_answers',
            'npm' => 'required|string|max:255|unique:user_answers',
            'answers.*' => 'required',
        ]);

        $existingEmail = DB::table('user_answers')->where('email', $data['email'])->exists();
        $existingNpm = DB::table('user_answers')->where('npm', $data['npm'])->exists();

        if ($existingEmail) {
            return redirect()->back()->withErrors(['email' => 'Email sudah ada.']);
        }

        if ($existingNpm) {
            return redirect()->back()->withErrors(['npm' => 'NPM sudah ada.']);
        }

        // Cari kuesioner berdasarkan ID
        $questionnaire = Questionnaire::with('questions')->findOrFail($id);

        // Loop melalui setiap jawaban yang diberikan
        foreach ($data['answers'] as $questionId => $answer) {
            $question = $questionnaire->questions->find($questionId);

            if ($question->type == 'multiple_choice') {
                // Simpan jawaban pilihan ganda
                DB::table('user_answers')->insert([
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'npm' => $data['npm'],
                    'question_id' => $questionId,
                    'answer_id' => $answer,
                ]);
            } else {
                // Simpan jawaban esai
                DB::table('user_answers')->insert([
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'npm' => $data['npm'],
                    'question_id' => $questionId,
                    'answer_text' => $answer,
                ]);
            }
        }

        return redirect('/pertanyaan')->with('success', 'Kuis berhasil Dikirim');
    }
}
