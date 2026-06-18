@extends('layouts.app')

@section('title', 'Panduan Penggunaan')

@section('style')
    <style>
        .guide-section {
            background: #eef5fb;
            min-height: 100vh;
            padding: 50px 20px;
        }

        .guide-container {
            max-width: 1000px;
            margin: auto;
        }

        .guide-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .guide-header h1 {
            color: #229add;
            margin-bottom: 10px;
        }

        .guide-header p {
            color: #666;
        }

        .step-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
        }

        .step-number {
            width: 45px;
            height: 45px;
            background: #229add;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .step-card h3 {
            color: #229add;
            margin-bottom: 10px;
        }

        .step-card p {
            line-height: 1.8;
            color: #444;
        }

        .guide-image {
            display: block;
            margin: 20px auto;
            width: 200px;
            height: auto;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        }

        .guide-images-row {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        .guide-image-half {
            width: 48%;
            min-width: 300px;
            border-radius: 12px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .08);
        }

        .bottom-action {
            text-align: center;
            margin-top: 40px;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #229add;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: .3s;
            box-shadow: 0 4px 12px rgba(34, 154, 221, .25);
        }

        .back-btn:hover {
            background: #1b87c4;
            transform: translateY(-2px);
        }

        .guide-image-landscape {
            display: block;
            margin: 20px auto;
            width: 600px;
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .08);
        }
    </style>
@endsection

@section('content')

    <section class="guide-section">

        <div class="guide-container">

            <div class="guide-header">
                <h1>Panduan Penggunaan</h1>
                <p>Petunjuk penggunaan Media Pembelajaran Interaktif Fisitera</p>
            </div>

            <div class="step-card">
                <div class="step-number">1</div>
                <h3>Mengakses Media</h3>
                <p>
                    Buka media Fisitera melalui browser pada komputer,
                    laptop, maupun smartphone yang terhubung ke internet.
                </p>
            </div>

            <div class="step-card">

                <div class="step-number">2</div>

                <h3>Login ke Sistem</h3>

                <img src="{{ asset('images/panduan/login.png') }}" alt="Halaman Login" class="guide-image">

                <p>
                    Untuk mengakses seluruh fitur pada media pembelajaran Fisitera,
                    siswa harus melakukan login terlebih dahulu menggunakan akun yang
                    telah diberikan. Masukkan Nomor Induk Siswa (NIS) pada kolom
                    username dan kata sandi (password) pada kolom yang tersedia.
                    Setelah data diisi dengan benar, klik tombol <strong>Masuk</strong>
                    untuk masuk ke dalam sistem dan memulai proses pembelajaran.
                </p>

            </div>

            <div class="step-card">
                <div class="step-number">3</div>

                <h3>Memulai Pembelajaran</h3>

                <img src="{{ asset('images/panduan/mulai.png') }}" alt="Halaman Login" class="guide-image">

                <p>
                    Setelah login berhasil dilakukan, siswa dapat menekan tombol
                    <strong>Mulai Belajar</strong> pada halaman utama. Sistem akan
                    mengarahkan siswa ke materi pertama pada bab Gelombang. Materi
                    disusun secara sistematis sehingga siswa dapat mengikuti urutan
                    pembelajaran dari Gelombang, Bunyi, hingga Cahaya melalui menu
                    navigasi yang tersedia.
                </p>
            </div>

            <div class="step-card">

                <div class="step-number">4</div>

                <h3>Mempelajari Materi</h3>

                <img src="{{ asset('images/panduan/materi.png') }}" alt="Halaman Materi" class="guide-image"
                    style="width: 600px">

                <p>
                    Materi pembelajaran disajikan dalam bentuk teks, gambar, animasi, dan
                    visualisasi konsep fisika untuk membantu siswa memahami materi secara
                    lebih mudah. Setiap submateri dapat diakses melalui menu navigasi yang
                    tersedia pada sisi kiri halaman. Posisi materi yang sedang dipelajari
                    ditandai dengan warna biru pada menu navigasi, sehingga siswa dapat
                    mengetahui submateri yang sedang dibuka dan memantau urutan pembelajaran
                    yang telah dipelajari. Siswa dapat berpindah ke submateri lain dengan
                    memilih menu yang tersedia sesuai kebutuhan pembelajaran.
                </p>

            </div>

            <div class="step-card">
                <div class="step-number">5</div>
                <h3>Menggunakan Simulasi Interaktif</h3>
                <img src="{{ asset('images/panduan/simulasi.png') }}" alt="Halaman Simulasi" class="guide-image"
                    style="width: 450px">
                <p>
                    Simulasi interaktif digunakan untuk membantu siswa memahami konsep fisika
                    melalui visualisasi dan interaksi secara langsung. Pada setiap halaman
                    simulasi, tersedia petunjuk penggunaan yang menjelaskan fungsi tombol,
                    langkah-langkah pengoperasian, serta cara melakukan pengamatan terhadap
                    fenomena yang ditampilkan. Siswa dapat mengikuti petunjuk tersebut untuk
                    menjalankan simulasi dan mengamati hubungan antara teori yang dipelajari
                    dengan visualisasi yang ditampilkan oleh media.
                </p>
            </div>

            <div class="step-card">

                <div class="step-number">6</div>

                <h3>Mengerjakan Kuis</h3>

                <div class="guide-images-row">
                    <img src="{{ asset('images/panduan/petunjuk_kuis.png') }}" alt="Petunjuk Kuis" class="guide-image-half">

                    <img src="{{ asset('images/panduan/kuis.png') }}" alt="Halaman Kuis" class="guide-image-half">
                </div>

                <p>
                    Setelah mempelajari seluruh materi pada suatu bab, siswa dapat
                    mengerjakan kuis untuk mengukur tingkat pemahaman terhadap materi
                    yang telah dipelajari. Sebelum kuis dimulai, sistem akan menampilkan
                    halaman petunjuk yang berisi informasi mengenai jumlah soal, waktu
                    pengerjaan, aturan pengerjaan, serta keterangan warna pada navigasi
                    soal. Setelah memahami petunjuk yang diberikan, siswa dapat menekan
                    tombol <strong>Mulai Kuis</strong> untuk memulai pengerjaan.
                </p>

                <p>
                    Kuis disajikan dalam bentuk soal pilihan ganda, di mana setiap soal
                    memiliki beberapa alternatif jawaban dan siswa diminta memilih satu
                    jawaban yang dianggap paling tepat. Selama pengerjaan kuis, siswa
                    dapat berpindah antar soal menggunakan tombol navigasi soal yang
                    tersedia pada sisi kanan halaman maupun menggunakan tombol
                    <strong>Sebelumnya</strong> dan <strong>Berikutnya</strong> pada bagian
                    bawah halaman.
                </p>

                <p>
                    Pada halaman kuis juga tersedia penghitung waktu (timer) yang
                    menunjukkan sisa waktu pengerjaan secara real-time. Warna pada
                    navigasi soal berfungsi sebagai penanda status pengerjaan, yaitu
                    abu-abu untuk soal yang belum dijawab, biru untuk soal yang sedang
                    aktif, hijau untuk soal yang telah dijawab, dan oranye untuk soal
                    yang ditandai ragu-ragu. Setelah seluruh soal selesai dikerjakan,
                    siswa dapat menekan tombol <strong>Selesaikan Kuis</strong> untuk
                    mengakhiri pengerjaan dan menyimpan jawaban yang telah dipilih.
                </p>

            </div>

            <div class="step-card">

                <div class="step-number">7</div>

                <h3>Melihat Profil dan Riwayat Hasil Kuis</h3>

                <img src="{{ asset('images/panduan/profil.png') }}" alt="Halaman Profil" class="guide-image-landscape">

                <img src="{{ asset('images/panduan/detail_profil.png') }}" alt="Halaman profil" class="guide-image-half">
                <p>
                    Untuk melihat informasi akun dan hasil pembelajaran, siswa dapat menekan
                    nama akun pada bagian kanan atas halaman kemudian memilih menu
                    <b>Profil Saya</b>. Halaman profil menampilkan informasi akun
                    pengguna, seperti nama, NISN, kelas, tahun, dan alamat email yang
                    terdaftar dalam sistem.
                </p>

                <p>
                    Selain informasi akun, halaman ini juga menampilkan ringkasan hasil kuis
                    yang telah dikerjakan, seperti jumlah kuis yang dikerjakan, rata-rata nilai,
                    nilai tertinggi, serta riwayat nilai kuis. Informasi tersebut dapat digunakan
                    siswa untuk memantau hasil belajar dan mengevaluasi pemahaman terhadap
                    materi yang telah dipelajari.
                </p>

            </div>

            <div class="step-card">
                <div class="step-number">8</div>
                <h3>Keluar dari Sistem</h3>
                <img src="{{ asset('images/panduan/profil.png') }}" alt="logout" class="guide-image-landscape">
                <p>
                    Setelah selesai menggunakan media, klik menu Logout
                    untuk keluar dari akun secara aman.
                </p>
            </div>
            <div class="bottom-action">
                <a href="{{ route('landing') }}" class="back-btn">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

    </section>

@endsection