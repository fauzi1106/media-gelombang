@extends('layouts.siswa')

@section('title', 'Profil Saya')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}?v={{ filemtime(public_path('css/profil.css')) }}">
@endsection

@section('siswa-content')

    <div class="profil-page">

        <h1>Profil Saya</h1>

        <div class="profil-card">

            <h3>Informasi Akun</h3>

            <p><strong>Nama :</strong> {{ $user->name }}</p>
            <p><strong>NISN :</strong> {{ $user->username }}</p>
            <p><strong>Kelas :</strong> {{ $user->kelas }}</p>
            <p><strong>Tahun :</strong> {{ $user->tahun }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>

        </div>
        <div class="profil-stats">

            <div class="profil-stat-card">
                <h4>Quiz Dikerjakan</h4>
                <p>{{ $jumlahQuiz }}</p>
            </div>

            <div class="profil-stat-card">
                <h4>Rata-rata Nilai</h4>
                <p>{{ $rataRata }}</p>
            </div>

            <div class="profil-stat-card">
                <h4>Nilai Tertinggi</h4>
                <p>{{ $nilaiTertinggi }}</p>
            </div>

        </div>

    </div>
    <div class="table-responsive">

        <h3>Riwayat Nilai Quiz</h3>

        <table class="profil-table">

            <thead>
                <tr>
                    <th>Quiz</th>
                    <th>Nilai</th>
                    <th>KKM</th>
                    <th>Status</th>
                    <th>Durasi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>

                @forelse($nilai as $n)
                    <tr>
                        <td>{{ $n->quiz->title ?? '-' }}</td>
                        <td>{{ $n->score }}</td>

                        <td>{{ $n->quiz->kkm }}</td>

                        <td>
                            @if($n->score >= $n->quiz->kkm)
                                <span class="status-lulus">Lulus</span>
                            @else
                                <span class="status-belum">Belum Lulus</span>
                            @endif
                        </td>

                        <td>
                        {{ sprintf('%02d:%02d', floor($n->duration / 60), $n->duration % 60) }}
                        </td>

                        <td>{{ $n->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6  ">
                            Belum ada riwayat quiz.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

@endsection