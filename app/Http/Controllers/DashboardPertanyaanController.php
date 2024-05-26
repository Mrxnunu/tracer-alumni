<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\tipe_soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dashboard.pertanyaan.index');
        // $parameters = Parameter::with(['topik', 'periode'])->latest()->get();

        $questioner = Questionnaire::all();
        // $questioner = Questionnaire::where('active', false)->get();
        return view('dashboard.pertanyaan.index', compact('questioner'));
    }

    /**
     * Show the form for creating a new resource.
     */


    // public function toggleActive($id)
    // {
    //     $questionnaire = Questionnaire::findOrFail($id);
    //     $questionnaire->active = !$questionnaire->active;
    //     $questionnaire->save();

    //     return redirect()->back()->with('success', 'Status berhasil diubah.');
    // }

    public function toggleActive($id)
    {
        // Begin a transaction
        DB::beginTransaction();

        try {
            // Deactivate all questionnaires
            Questionnaire::where('active', true)->update(['active' => false]);

            // Find the selected questionnaire
            $questionnaire = Questionnaire::findOrFail($id);

            // Toggle the active status
            $questionnaire->active = !$questionnaire->active;
            $questionnaire->save();

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Status berhasil diubah.');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah status.');
        }
    }


    public function create()
    {
        return view('dashboard.pertanyaan.create');
        // return view('dashboard.pertanyaan.create', [
        //     'tipesoals' => tipe_soal::all()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'questions.*.question_text' => 'required',
            'questions.*.type' => 'required|in:multiple_choice,essay',
            'questions.*.answers.*.answer_text' => 'required_if:questions.*.type,multiple_choice',
        ]);

        $questionnaire = Questionnaire::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        foreach ($data['questions'] as $questionData) {
            $question = $questionnaire->questions()->create([
                'question_text' => $questionData['question_text'],
                'type' => $questionData['type'],
            ]);

            if ($questionData['type'] == 'multiple_choice') {
                $question->answers()->createMany($questionData['answers']);
            }
        }
        return redirect('/dashboard/pertanyaan')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questionnaire = Questionnaire::with('questions.answers')->findOrFail($id);


        return view('dashboard.pertanyaan.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
