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
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $file = $request->file('file');

        $fileName = 'gelombang_' . Auth::id() . '_' . time() . '.pdf';

        $path = $file->storeAs('submissions', $fileName, 'public');

        GelombangSubmission::create([
            'user_id' => Auth::id(),
            'file_path' => $path
        ]);

        return back()->with('success', 'File berhasil dikumpulkan!');
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