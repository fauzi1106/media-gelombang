<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;


class GuruController extends Controller
{

    public function exportNilai(Request $request)
    {
        $quiz_id = $request->quiz_id;
        $mode = $request->mode ?? 'all';

        return Excel::download(
            new NilaiExport($quiz_id, $mode, 70),
            'data_nilai.xlsx'
        );
    }


    public function deleteAttempt($id)
    {
        Nilai::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }
    public function deleteAll($user, $quiz)
    {
        Nilai::where('user_id', $user)
            ->where('quiz_id', $quiz)
            ->delete();

        return response()->json(['success' => true]);
    }

    public function nilai()
    {
        // ============================
        // KKM (UBAH DI SINI JIKA PERLU)
        // ============================
        $kkm = 70;

        // ambil nilai tertinggi per siswa & kuis
        $nilai = Nilai::select(
            'user_id',
            'quiz_id',
            \DB::raw('MAX(score) as score'),
            \DB::raw('COUNT(*) as total_attempt')
        )
            ->groupBy('user_id', 'quiz_id')
            ->with(['user', 'quiz'])
            ->get();

        // ambil detail percobaan
        foreach ($nilai as $n) {
            $n->detail = Nilai::where('user_id', $n->user_id)
                ->where('quiz_id', $n->quiz_id)
                ->orderBy('created_at')
                ->get();
        }

        return view('guru.nilai', compact('nilai', 'kkm'));
    }

    public function siswa()
    {
        $siswa = User::where('role', 'murid')->get();

        return view('guru.siswa', compact('siswa'));
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'username' => 'required|numeric|digits_between:5,15|unique:users,username',
            'name' => 'required',
            'email' => 'required|email',
            'kelas' => 'required',
            'tahun' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas' => $request->kelas,
            'tahun' => $request->tahun,
            'role' => 'murid'
        ]);
        return back()->with('success', 'Siswa berhasil ditambahkan');
    }

    public function updateSiswa(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'kelas' => 'required',
            'tahun' => 'required',
            'password' => 'nullable|min:6'
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'tahun' => $request->tahun,
        ];

        // Kalau password diisi → update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Data siswa berhasil diperbarui');
    }
    public function deleteSiswa($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'Siswa berhasil dihapus');
    }

}
