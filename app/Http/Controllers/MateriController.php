<?php

namespace App\Http\Controllers;

use View;
use App\Models\Nilai;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuizAttempt;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function pengantarGelombang()
    {
        return view('pengantar_gelombang');
    }

    public function definisiGelombang()
    {
        return view('definisi_gelombang');
    }

    public function jenisGelombang()
    {
        return view('jenis_gelombang');
    }

    public function bedafaseGelombang()
    {
        return view('beda_fase_gelombang');
    }

    public function prinsipGelombang()
    {
        return view('prinsip_gelombang');
    }

    public function pengantarBunyi()
    {
        return view('pengantar_bunyi');
    }

    public function konsepPerambatanBunyi()
    {
        return view('konsep_perambatan_bunyi');
    }

    public function sumberKarBunyi()
    {
        return view('sumber_kar_bunyi');
    }

    public function fenomenaApkBunyi()
    {
        return view('fenomena_apk_bunyi');
    }

    public function pengantarCahaya()
    {
        return view('pengantar_cahaya');
    }

    public function sifatCahaya()
    {
        return view('sifat_cahaya');
    }

    public function spektrumCahaya()
    {
        return view('spektrum_cahaya');
    }

    public function fenomenaApkCahaya()
    {
        return view('fenomena_apk_cahaya');
    }

    public function kuisGelombang()
    {
        $questions = Question::where('quiz_id', 1)
            ->orderBy('id', 'asc')
            ->limit(10)
            ->get()
            ->map(function ($q) {
                return [
                    'id' => $q->id, // ✅ PENTING
                    'q' => $q->question,
                    'options' => [
                        $q->option_a,
                        $q->option_b,
                        $q->option_c,
                        $q->option_d,
                        $q->option_e
                    ],
                    'answer' => $q->answer
                ];
            });

        return view('kuis_gelombang', [
            'questions' => $questions,
            'quiz_id' => 1
        ]);
    }
    public function kuisBunyi()
    {
        $questions = Question::where('quiz_id', 2)
            ->orderBy('id', 'asc') // ✅ urut tetap
            ->limit(10)            // ✅ hanya 10 soal
            ->get()
            ->map(function ($q) {
                return [
                    'id' => $q->id, // ✅ penting untuk analisis
                    'q' => $q->question,
                    'options' => [
                        $q->option_a,
                        $q->option_b,
                        $q->option_c,
                        $q->option_d,
                        $q->option_e
                    ],
                    'answer' => $q->answer
                ];
            });

        return view('kuis_bunyi', [
            'questions' => $questions,
            'quiz_id' => 2
        ]);
    }

    public function kuisCahaya()
    {
        $questions = Question::where('quiz_id', 3)
            ->orderBy('id', 'asc')
            ->limit(10)
            ->get()
            ->map(function ($q) {
                return [
                    'id' => $q->id,
                    'q' => $q->question,
                    'options' => [
                        $q->option_a,
                        $q->option_b,
                        $q->option_c,
                        $q->option_d,
                        $q->option_e
                    ],
                    'answer' => $q->answer
                ];
            });

        return view('kuis_cahaya', [
            'questions' => $questions,
            'quiz_id' => 3
        ]);
    }





    public function simpanNilai(Request $request)
    {
        // simpan nilai seperti sekarang
        Nilai::create([
            'user_id' => auth()->id(),
            'quiz_id' => $request->quiz_id,
            'score' => $request->score,
            'total_soal' => $request->total_soal,
            'benar' => $request->benar,
            'duration' => $request->duration
        ]);

        // buat attempt
        $attempt = QuizAttempt::create([
            'quiz_id' => $request->quiz_id,
            'user_id' => auth()->id(),
            'score' => $request->score
        ]);

        $answers = $request->answers;
        $questions = $request->questions;

        foreach ($questions as $index => $q) {

            $selected = $answers[$index] ?? null;
            $isCorrect = ($selected == $q['answer']);

            StudentAnswer::create([
                'attempt_id' => $attempt->id,
                'question_id' => $q['id'],
                'selected_answer' => $selected,
                'is_correct' => $isCorrect
            ]);
        }

        return response()->json(['success' => true]);
    }


}
