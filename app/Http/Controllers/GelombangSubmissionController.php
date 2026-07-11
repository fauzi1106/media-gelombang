<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\GelombangSubmission;

class GelombangSubmissionController extends Controller
{
    // =========================
    // HALAMAN SISWA
    // =========================
    public function index()
    {
        return view('siswa.pengumpulan_gelombang');
    }

    // =========================
    // PROSES UPLOAD
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'latihan_code' => 'required'
        ]);

        $file = $request->file('file');

        $fileName = $request->latihan_code . '_' . Auth::id() . '_' . time() . '.pdf';

        $file->move(
            public_path('submissions'),
            $fileName
        );

        $path = 'submissions/' . $fileName;

        // ===========================
        // CEK DATA LAMA
        // ===========================
        $submission = GelombangSubmission::where('user_id', Auth::id())
            ->where('latihan_code', $request->latihan_code)
            ->first();

        if ($submission) {

            if (
                $submission->file_path &&
                file_exists(public_path($submission->file_path))
            ) {
                unlink(public_path($submission->file_path));
            }

            $submission->update([
                'file_path' => $path
            ]);

        } else {

            GelombangSubmission::create([
                'user_id' => Auth::id(),
                'latihan_code' => $request->latihan_code,
                'file_path' => $path
            ]);

        }

        return response()->json([
            'success' => true
        ]);
    }

    // =========================
    // HALAMAN GURU
    // =========================
    public function daftar()
    {
        $data = GelombangSubmission::with('user')->latest()->get();
        return view('guru.daftar_pengumpulan', compact('data'));
    }
}