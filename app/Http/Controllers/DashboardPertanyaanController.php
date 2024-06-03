<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\tipe_soal;
use App\Models\UserAnswer;
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

        // $questioner = Questionnaire::all();
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
            ->get();
        // $questioner = Questionnaire::where('active', false)->get();
        return view('dashboard.pertanyaan.index', compact('questionnaires'));
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

        DB::beginTransaction();

        try {
            // Menon aktifkna pertanyaan
            Questionnaire::where('active', true)->update(['active' => false]);

            // menentukan kuisioner yang akan dipilih
            $questionnaire = Questionnaire::findOrFail($id);

            // tobmbol toogle jadi aktif
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
    // public function store(Request $request)
    // {
    //     // return $request;
    //     $data = $request->validate([
    //         'title' => 'required',
    //         'description' => 'nullable',
    //         'questions.*.question_text' => 'required',
    //         'questions.*.type' => 'required|in:multiple_choice,essay',
    //         'questions.*.answers.*.answer_text' => 'required_if:questions.*.type,multiple_choice',
    //     ]);

    //     $questionnaire = Questionnaire::create([
    //         'title' => $data['title'],
    //         'description' => $data['description'],
    //     ]);

    //     foreach ($data['questions'] as $questionData) {
    //         $question = $questionnaire->questions()->create([
    //             'question_text' => $questionData['question_text'],
    //             'type' => $questionData['type'],
    //         ]);

    //         if ($questionData['type'] == 'multiple_choice') {
    //             $question->answers()->createMany($questionData['answers']);
    //         }
    //     }
    //     return redirect('/dashboard/pertanyaan')->with('success', 'berhasil ditambahkan');
    // }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Tema wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'questions.required' => 'Anda harus menambahkan setidaknya satu pertanyaan.',
            'questions.*.question_text.required' => 'Teks pertanyaan wajib diisi.',
            'questions.*.type.required' => 'Tipe pertanyaan wajib dipilih.',
            'questions.*.type.in' => 'Tipe pertanyaan harus berupa pilihan ganda atau esai.',
            'questions.*.answers.*.answer_text.required_if' => 'Jawaban untuk pertanyaan pilihan ganda wajib diisi.',
        ];

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'questions' => 'required|array|min:1',
            'questions.*.question_text' => 'required',
            'questions.*.type' => 'required|in:multiple_choice,essay',
            'questions.*.answers.*.answer_text' => 'required_if:questions.*.type,multiple_choice',
        ], $messages);

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

    public function showResponden(string $id)
    {
        $questionIds = Question::where('questionnaire_id', $id)->pluck('id');

        // Mengambil user answers yang distinct berdasarkan nama, email, npm, prodi, dan tahun_lulus
        $userAnswers = UserAnswer::whereIn('question_id', $questionIds)
            ->select('nama', 'email', 'npm', 'prodi', 'tahun_lulus')
            ->distinct()
            ->get();

        // $questionnaireTitle = Questionnaire::where('questionnaire_id', $id)->pluck('title');

        $questionnaireTitle = Questionnaire::where('id', $id)->value('title');

        return view('dashboard.pertanyaan.showResponden', compact('userAnswers', 'questionnaireTitle'));
    }

    public function showDetailResponden($npm)
    {
        $alumni = DB::table('user_answers')
            ->where('npm', $npm)
            ->first();

        $jawaban = DB::table('user_answers')
            ->where('npm', $npm)
            ->get();

        // Retrieve questions with answers
        $jawabanWithQuestions = $jawaban->map(function ($item) {
            $question = DB::table('questions')
                ->where('id', $item->question_id)
                ->select('question_text', 'type', 'questionnaire_id')
                ->first();

            return [
                'question_text' => $question->question_text,
                'type' => $question->type,
                'answer_text' => $item->answer_id
                    ? DB::table('answers')->where('id', $item->answer_id)->value('answer_text')
                    : $item->answer_text,
                'questionnaire_id' => $question->questionnaire_id
            ];
        });

        $questionnaireId = $jawabanWithQuestions->first()['questionnaire_id'];
        $questionnaireTitle = DB::table('questionnaires')
            ->where('id', $questionnaireId)
            ->value('title');

        return view('dashboard.pertanyaan.showDetailResponden', compact('alumni', 'jawabanWithQuestions', 'questionnaireTitle'));
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
