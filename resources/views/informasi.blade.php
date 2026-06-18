@extends('layouts.app')

@section('title', 'Informasi Media')

@section('style')
    <style>
        .info-section {
            min-height: calc(100vh - 70px);
            background: #eef5fb;
            padding: 50px 20px;
        }

        .info-container {
            max-width: 1000px;
            margin: auto;
        }

        .info-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .info-header h1 {
            color: #229add;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .info-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
        }

        .info-card h3 {
            color: #229add;
            margin-bottom: 15px;
            border-bottom: 2px solid #eef5fb;
            padding-bottom: 10px;
        }

        .info-card p {
            line-height: 1.8;
            color: #444;
            text-align: justify;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .info-table td:first-child {
            width: 250px;
            font-weight: 600;
        }
        .bottom-action{
    text-align:center;
    margin-top:40px;
}

.back-btn{
    display:inline-block;
    padding:12px 24px;
    background:#229add;
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
    box-shadow:0 4px 12px rgba(34,154,221,.25);
}

.back-btn:hover{
    background:#1b87c4;
    transform:translateY(-2px);
}
    </style>
@endsection

@section('content')

    <section class="info-section">

        <div class="info-container">

            <div class="info-header">
                <h1>Informasi Media</h1>
                <p>Media Pembelajaran Interaktif Fisitera</p>
            </div>

            <div class="info-card">
                <h3>Deskripsi Media</h3>

                <p>
                    Fisitera (Fisika Interaktif) merupakan media pembelajaran berbasis web
                    yang dikembangkan untuk membantu peserta didik mempelajari materi
                    Gelombang, Bunyi, dan Cahaya melalui penyajian materi, animasi,
                    simulasi interaktif, latihan soal, serta evaluasi pembelajaran.
                </p>
            </div>

            <div class="info-card">
                <h3>Informasi Umum</h3>

                <table class="info-table">
                    <tr>
                        <td>Nama Media</td>
                        <td>Fisitera (Fisika Interaktif)</td>
                    </tr>

                    <tr>
                        <td>Jenis Media</td>
                        <td>Media Pembelajaran Berbasis Web</td>
                    </tr>

                    <tr>
                        <td>Materi</td>
                        <td>Gelombang, Bunyi, dan Cahaya</td>
                    </tr>

                    <tr>
                        <td>Sasaran Pengguna</td>
                        <td>Peserta Didik SMA/MA Sederajat</td>
                    </tr>

                    <tr>
                        <td>Platform</td>
                        <td>Website (Web Based Learning)</td>
                    </tr>

                    <tr>
                        <td>Versi Media</td>
                        <td>1.0</td>
                    </tr>
                </table>
            </div>

            <div class="info-card">
                <h3>Tujuan Pengembangan</h3>

                <p>
                    Media ini dikembangkan untuk mendukung proses pembelajaran fisika
                    yang lebih interaktif dan menarik, sehingga peserta didik dapat
                    memahami konsep-konsep abstrak melalui visualisasi, simulasi,
                    serta aktivitas belajar yang melibatkan partisipasi aktif pengguna.
                </p>
            </div>

            <div class="info-card">
                <h3>Cakupan Materi Pembelajaran</h3>

                <table class="info-table">
                    <tr>
                        <td>Gelombang</td>
                        <td>
                            <ul>
                                <li>Pengantar Gelombang</li>
                                <li>Definisi dan Konsep Dasar Getaran dan Gelombang</li>
                                <li>Jenis-Jenis Gelombang</li>
                                <li>Beda Fase Gelombang</li>
                                <li>Prinsip-Prinsip Gelombang</li>
                                <li>Kuis Gelombang</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td>Gelombang Bunyi</td>
                        <td>
                            <ul>
                                <li>Pengantar Gelombang Bunyi</li>
                                <li>Konsep Dasar dan Perambatan Bunyi</li>
                                <li>Karakteristik Bunyi</li>
                                <li>Fenomena dan Aplikasi Bunyi</li>
                                <li>Kuis Pemahaman Materi Bunyi</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td>Gelombang Cahaya</td>
                        <td>
                            <ul>
                                <li>Pengantar Gelombang Cahaya</li>
                                <li>Sifat-Sifat Cahaya</li>
                                <li>Spektrum Cahaya</li>
                                <li>Fenomena dan Aplikasi Cahaya</li>
                                <li>Kuis Pemahaman Materi Cahaya</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="info-card">
                <h3>Fitur Media</h3>

                <ul>
                    <li>Materi pembelajaran interaktif.</li>
                    <li>Animasi konsep fisika.</li>
                    <li>Simulasi interaktif.</li>
                    <li>Latihan soal.</li>
                    <li>Evaluasi pembelajaran.</li>
                    <li>Monitoring progres belajar.</li>
                </ul>
            </div>

            <div class="info-card">
                <h3>Pengembang Media</h3>

                <table class="info-table">
                    <tr>
                        <td>Nama Pengembang</td>
                        <td>Fauzia 'Uddin</td>
                    </tr>

                    <tr>
                        <td>Dosen Pembimbing 1</td>
                        <td>Dr. Andi Ichsan Mahardika, M.Pd.</td>
                    </tr>

                    <tr>
                        <td>Dosen Pembimbing 2</td>
                        <td>Novan Alkaf Bahraini Saputra, S.Kom., M.T.</td>
                    </tr>

                    <tr>
                        <td>Jurusan</td>
                        <td>Pendidikan Komputer FKIP Universitas Lambung Mangkurat</td>
                    </tr>

                    <tr>
                        <td>Tahun Pengembangan</td>
                        <td>2025–2026</td>
                    </tr>
                </table>
            </div>

            <div class="bottom-action">
                <a href="{{ route('landing') }}" class="back-btn">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

    </section>

@endsection