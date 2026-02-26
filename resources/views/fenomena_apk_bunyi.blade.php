@extends('layouts.siswa')

@section('title', 'Jenis-Jenis Gelombang')

@section('siswa-content')

    <div class="materi-gelombang">


        <main class="content">
            <h2>Fenomena & Aplikasi Bunyi</h2>

            <div class="box">

                <!-- ====================
                    HALAMAN 1 – PENGERTIAN GEMA
                    ==================== -->
                <section id="page-intro" class="subpage materi">

                    <header class="materi-header">
                        <h2>Pengertian Gema</h2>
                    </header>

                    <figure class="materi-gambar">
                        <img src="{{ asset('images/gambar-gema.png') }}" alt="Ilustrasi terjadinya gema"
                            style="width: 500px; height: 260px;">
                        <figcaption>Ilustrasi bunyi pantul yang menyebabkan gema</figcaption>
                    </figure>

                    <div class="materi-deskripsi">
                        <p>
                            <strong>Gema</strong> adalah bunyi pantul yang terdengar kembali
                            <strong>setelah bunyi asli selesai terdengar</strong>.
                            Gema terjadi ketika gelombang bunyi mengenai permukaan keras,
                            lalu dipantulkan kembali ke telinga pendengar dengan jeda waktu tertentu.
                        </p>

                        <p>
                            Agar gema dapat terdengar jelas, bunyi pantul harus sampai ke telinga
                            minimal <strong>0,1 detik</strong> setelah bunyi asli.
                            Jika jeda waktunya terlalu singkat, bunyi pantul tidak terdengar sebagai gema.
                        </p>
                    </div>

                    <div class="materi-dua-kolom">
                        <div class="kolom">
                            <h3>Ciri-Ciri Gema</h3>
                            <ul>
                                <li>Bunyi terdengar dua kali atau lebih</li>
                                <li>Bunyi pantul terdengar terpisah dari bunyi asli</li>
                                <li>Terjadi di tempat yang luas dan memiliki bidang pantul keras</li>
                            </ul>
                        </div>

                        <div class="kolom">
                            <h3>Syarat Terjadinya Gema</h3>
                            <ul>
                                <li>Terdapat bidang pemantul seperti dinding, tebing, atau gunung</li>
                                <li>Jarak sumber bunyi ke bidang pantul cukup jauh</li>
                                <li>Bunyi merambat melalui suatu medium, biasanya udara</li>
                            </ul>
                        </div>
                    </div>

                </section>

                <!-- ====================
                 HALAMAN 2 – GEMA & GAUNG
                 ==================== -->
                <section id="page-gema" class="subpage materi" style="display:none;">

                    <header class="materi-header">
                        <h2>Gema dan Gaung</h2>
                    </header>

                    <div class="latihan-tabs-wrapper">

                        <!-- TAB HEADER -->
                        <div class="latihan-tabs-header">
                            <button class="latihan-tab-btn latihan-tab-active" data-target="gema-materi">
                                Materi
                            </button>
                            <button class="latihan-tab-btn" data-target="gema-latihan1">
                                Latihan 1
                            </button>
                            <button class="latihan-tab-btn" data-target="gema-latihan2">
                                Latihan 2
                            </button>
                        </div>

                        <!-- ================= MATERI ================= -->
                        <div id="gema-materi" class="latihan-tab-page latihan-tab-page-active">

                            <!-- ================= PENGANTAR ================= -->
                            <p>
                                Ketika bunyi mengenai permukaan keras seperti dinding,
                                tebing, atau gunung, bunyi tersebut akan dipantulkan kembali.
                                Bunyi pantul inilah yang menyebabkan kita dapat mendengar
                                <b>gema</b> atau <b>gaung</b>.
                            </p>

                            <div class="box-diff">
                                <b>Gema</b> terdengar jelas karena bunyi pantul datang
                                setelah bunyi asli selesai.<br>
                                <b>Gaung</b> terjadi ketika bunyi pantul datang hampir
                                bersamaan dengan bunyi asli sehingga bunyi terdengar tidak jelas.
                            </div>

                            <!-- ================= PERBEDAAN ================= -->
                            <div class="materi-dua-kolom" style="margin-top:16px;">

                                <div class="kolom">
                                    <h3>Gema</h3>
                                    <ul>
                                        <li>Bunyi terdengar ulang dengan jelas</li>
                                        <li>Ada jeda waktu dengan bunyi asli</li>
                                        <li>Terjadi di tempat terbuka</li>
                                        <li>Contoh: gua, tebing</li>
                                    </ul>
                                </div>

                                <div class="kolom">
                                    <h3>Gaung</h3>
                                    <ul>
                                        <li>Bunyi bercampur dengan bunyi asli</li>
                                        <li>Tidak ada jeda waktu jelas</li>
                                        <li>Terjadi di ruangan besar</li>
                                        <li>Contoh: aula, gedung kosong</li>
                                    </ul>
                                </div>

                            </div>

                            <!-- ================= KONSEP FISIKA ================= -->
                            <div class="box-diff" style="margin-top:18px;">
                                Bunyi pantul dapat digunakan untuk menentukan jarak suatu benda.
                                Karena bunyi menempuh perjalanan pergi dan kembali,
                                maka jarak dihitung dengan rumus:
                                <br><br>
                                <b>s = v × t / 2</b>
                                <br><br>
                                Keterangan:<br>
                                s = jarak (meter)<br>
                                v = cepat rambat bunyi (m/s)<br>
                                t = waktu bunyi pergi dan kembali (detik)
                            </div>

                            <!-- ================= SIMULASI ================= -->
                            <div class="interaktif-box" style="margin-top:20px;">
                                <h4>Simulasi Gema (Interaktif)</h4>

                                <p>
                                    Aktifkan mikrofon lalu berbicaralah.
                                    Nyalakan gema untuk merasakan perbedaan bunyi asli
                                    dan bunyi pantul seperti di dalam gua.
                                </p>

                                <button class="next-btn" id="btn-mic">Aktifkan Mikrofon</button>
                                <button class="next-btn" id="btn-echo">Gema OFF</button>

                                <canvas id="waveCanvas" width="500" height="150"
                                    style="margin-top:12px; background:#ffffff; border-radius:8px;">
                                </canvas>

                                <p style="font-size:0.8rem; text-align:center; margin-top:6px;">
                                    Visualisasi gelombang bunyi dari suara kamu
                                </p>
                            </div>

                        </div>

                        <!-- ================= LATIHAN 1 ================= -->
                        <div id="gema-latihan1" class="latihan-tab-page">

                            <div class="box-diff">
                                <p><b>Latihan 1 – Jarak Tebing</b></p>

                                <p>
                                    Seorang siswa mendengar gema setelah <b>2 detik</b>.
                                    Jika cepat rambat bunyi <b>340 m/s</b>,
                                    tentukan jarak siswa ke tebing.
                                </p>

                                s = <input type="number" id="gema1-jawaban" style="width:120px;"> meter

                                <br><br>
                                <button class="next-btn" id="gema1-btn">Cek Jawaban</button>

                                <p id="gema1-feedback"></p>
                            </div>

                        </div>

                        <!-- ================= LATIHAN 2 ================= -->
                        <div id="gema-latihan2" class="latihan-tab-page">

                            <div class="box-diff">
                                <p><b>Latihan 2 – SONAR</b></p>

                                <p>
                                    Bunyi pantul diterima kembali setelah <b>4 detik</b>.
                                    Jika cepat rambat bunyi di air <b>1500 m/s</b>,
                                    tentukan kedalaman laut.
                                </p>

                                s = <input type="number" id="gema2-jawaban" style="width:120px;"> meter

                                <br><br>
                                <button class="next-btn" id="gema2-btn">Cek Jawaban</button>

                                <p id="gema2-feedback"></p>
                            </div>

                        </div>

                    </div>
                </section>


                <!-- ====================
                 HALAMAN 3 – RESONANSI
                 ==================== -->
                <section id="page-resonansi" class="subpage materi" style="display:none;">

                    <header class="materi-header">
                        <h2>Resonansi</h2>
                    </header>

                    <div class="materi-deskripsi">
                        <p>
                            <strong>Resonansi</strong> adalah peristiwa ikut bergetarnya suatu benda
                            karena menerima getaran dari sumber lain yang memiliki
                            <strong>frekuensi sama atau hampir sama</strong>.
                        </p>

                        <p>
                            Pada peristiwa resonansi, getaran yang terjadi menjadi
                            <strong>lebih kuat</strong> sehingga bunyi terdengar lebih nyaring.
                        </p>
                    </div>

                    <div class="example-row">
                        <div class="example-text">
                            <div class="materi-dua-kolom">

                                <div class="kolom">
                                    <h3>Contoh Resonansi</h3>
                                    <ul>
                                        <li>Kotak gitar memperkuat bunyi senar</li>
                                        <li>Kolom udara pada seruling ikut bergetar</li>
                                        <li>Speaker menghasilkan bunyi lebih kuat dengan kotak</li>
                                    </ul>
                                </div><br><br>

                                <div class="kolom">
                                    <h3>Ciri-Ciri Resonansi</h3>
                                    <ul>
                                        <li>Terjadi karena frekuensi sama atau hampir sama</li>
                                        <li>Bunyi menjadi lebih keras</li>
                                        <li>Melibatkan lebih dari satu benda</li>
                                    </ul>
                                </div>

                            </div>
                        </div>


                        <div class="example-image">
                            <figure class="materi-gambar">
                                <img src="{{ asset('images/resonansi.png') }}" alt="Ilustrasi peristiwa resonansi"
                                    style="width: 600px; height: 260px;">
                                <figcaption>Resonansi memperkuat bunyi melalui getaran tambahan</figcaption>
                            </figure>
                        </div>
                    </div>

                    <div class="note-box" style="margin-top:16px;">
                        <strong>Catatan Penting:</strong><br>
                        Resonansi dimanfaatkan dalam alat musik dan teknologi
                        untuk memperkuat bunyi.
                    </div>

                </section>

                <!-- ====================
                 HALAMAN 4 – APLIKASI BUNYI
                 ==================== -->
                <section id="page-aplikasi" class="subpage materi" style="display:none;">

                    <header class="materi-header">
                        <h2>Aplikasi Bunyi dalam Kehidupan</h2>
                    </header>

                    <p>
                        Bunyi tidak hanya dapat didengar, tetapi juga dapat dimanfaatkan
                        dalam berbagai bidang kehidupan. Pemanfaatan bunyi umumnya
                        menggunakan prinsip <strong>pemantulan gelombang bunyi</strong>
                        dan <strong>perambatan bunyi</strong>.
                    </p>

                    <h3>SONAR</h3>
                    <p>
                        <strong>SONAR</strong> (<i>Sound Navigation and Ranging</i>) adalah
                        teknologi yang memanfaatkan bunyi pantul untuk mengetahui
                        jarak, posisi, dan bentuk benda di dalam air.
                    </p>

                    <p>
                        SONAR bekerja dengan cara memancarkan gelombang bunyi ke dalam air.
                        Gelombang tersebut akan dipantulkan kembali ketika mengenai suatu benda,
                        lalu diterima oleh alat penerima.
                    </p>

                    <ul>
                        <li>Mengukur kedalaman laut</li>
                        <li>Mendeteksi keberadaan ikan</li>
                        <li>Membantu navigasi kapal selam</li>
                    </ul>

                    <div class="box-diff">
                        <strong>Prinsip kerja SONAR:</strong><br>
                        Bunyi dipancarkan → mengenai benda → dipantulkan → diterima kembali
                    </div>

                    <h3 style="margin-top:18px;">USG</h3>
                    <p>
                        <strong>USG</strong> (<i>Ultrasonografi</i>) adalah teknologi medis
                        yang menggunakan bunyi ultrasonik untuk melihat kondisi
                        organ dalam tubuh manusia.
                    </p>

                    <p>
                        Bunyi ultrasonik memiliki frekuensi sangat tinggi sehingga
                        tidak dapat didengar oleh telinga manusia, tetapi aman
                        digunakan dalam dunia medis.
                    </p>

                    <ul>
                        <li>Pemeriksaan kehamilan</li>
                        <li>Pemeriksaan organ dalam tubuh</li>
                        <li>Mendeteksi kelainan jaringan</li>
                        <li>Aman karena tidak menggunakan radiasi</li>
                    </ul>

                    <div class="note-box">
                        USG memanfaatkan bunyi pantul dari jaringan tubuh
                        untuk membentuk gambar organ dalam.
                    </div>

                    <figure class="materi-gambar" style="margin-top:22px; text-align:center;">
                        <img src="{{ asset('images/sonar_usg_placeholder.png') }}"
                            alt="Ilustrasi pemanfaatan bunyi pada SONAR dan USG"
                            style="max-width:520px; width:100%; height:auto;">
                        <figcaption class="caption">
                            Pemanfaatan bunyi pantul dalam teknologi SONAR dan USG
                        </figcaption>
                    </figure>

                </section>

                <!-- ====================
                 HALAMAN 5 – EFEK DOPPLER
                 ==================== -->
                <section id="page-doppler" class="subpage materi" style="display:none;">

                    <header class="materi-header">
                        <h2>Efek Doppler</h2>
                    </header>

                    <p>
                        <strong>Efek Doppler</strong> adalah peristiwa berubahnya frekuensi
                        bunyi yang terdengar akibat adanya gerak relatif antara
                        <strong>sumber bunyi</strong> dan <strong>pendengar</strong>.
                    </p>

                    <p>
                        Perubahan frekuensi ini menyebabkan bunyi yang terdengar
                        menjadi berbeda meskipun sumber bunyinya sama.
                    </p>

                    <div class="note-box">
                        Efek Doppler menyebabkan bunyi terdengar
                        <strong>lebih tinggi</strong> saat sumber bunyi mendekat dan
                        <strong>lebih rendah</strong> saat sumber bunyi menjauh.
                    </div>

                    <h3>Bagaimana Efek Doppler Terjadi?</h3>
                    <p>
                        Ketika sumber bunyi mendekati pendengar, gelombang bunyi
                        menjadi lebih rapat sehingga frekuensinya meningkat.
                        Sebaliknya, ketika sumber bunyi menjauh, gelombang bunyi
                        menjadi lebih renggang sehingga frekuensinya menurun.
                    </p>

                    <h3>Contoh Efek Doppler dalam Kehidupan Sehari-hari</h3>
                    <ul>
                        <li>Sirene ambulans atau mobil pemadam kebakaran yang melintas</li>
                        <li>Kereta api yang lewat di dekat peron</li>
                        <li>Sepeda motor yang melaju melewati pendengar</li>
                    </ul>

                    <div class="box-diff">
                        Contoh perubahan bunyi:<br>
                        Sirene mendekat → bunyi lebih tinggi<br>
                        Sirene menjauh → bunyi lebih rendah
                    </div>

                    <figure class="materi-gambar" style="margin-top:22px; text-align:center;">
                        <img src="{{ asset('images/doppler.png') }}" alt="Ilustrasi efek Doppler"
                            style="max-width:500px; width:100%; height:auto;">
                        <figcaption class="caption">
                            Perubahan frekuensi bunyi akibat gerak sumber bunyi
                        </figcaption>
                    </figure>

                </section>


            </div>
            <!-- ====================
                 NAVIGASI INTERNAL
                ==================== -->
            <div class="inner-navigation" style="margin-top:12px; display:flex; gap:6px; flex-wrap:wrap;">

                <button id="inner-prev" class="next-btn">Previous</button>

                <button class="next-btn inner-nav-btn" data-target="page-intro">1</button>
                <button class="next-btn inner-nav-btn" data-target="page-gema">2</button>
                <button class="next-btn inner-nav-btn" data-target="page-resonansi">3</button>
                <button class="next-btn inner-nav-btn" data-target="page-aplikasi">4</button>
                <button class="next-btn inner-nav-btn" data-target="page-doppler">5</button>

                <button id="inner-next" class="next-btn">Next</button>

            </div>

            <button class="next-btn" onclick="location.href='{{ url('sumber_kar_bunyi') }}'">
                ← Materi Sebelumnya
            </button>

            <button class="next-btn" onclick="location.href='{{ url('kuis_bunyi') }}'">
                Mulai Kuis →
            </button>

        </main>
@endsection
    @section('scripts')
            <script>
                document.addEventListener("DOMContentLoaded", () => {

                    /* =========================
                       NAVIGASI HALAMAN
                    ========================= */
                    const pages = document.querySelectorAll(".subpage");
                    const navButtons = document.querySelectorAll(".inner-nav-btn");
                    const prevBtn = document.getElementById("inner-prev");
                    const nextBtn = document.getElementById("inner-next");

                    const order = [
                        "page-intro",
                        "page-gema",
                        "page-resonansi",
                        "page-aplikasi",
                        "page-doppler"
                    ];

                    let currentIndex = 0;

                    function showPage(id) {
                        pages.forEach(p => p.style.display = (p.id === id) ? "block" : "none");

                        navButtons.forEach(btn => {
                            const active = btn.dataset.target === id;
                            btn.style.backgroundColor = active ? "#0f766e" : "";
                            btn.style.color = active ? "#ffffff" : "";
                        });

                        currentIndex = order.indexOf(id);
                        prevBtn.disabled = currentIndex === 0;
                        nextBtn.disabled = currentIndex === order.length - 1;
                    }

                    navButtons.forEach(btn => {
                        btn.addEventListener("click", () => showPage(btn.dataset.target));
                    });

                    prevBtn.addEventListener("click", () => {
                        if (currentIndex > 0) showPage(order[currentIndex - 1]);
                    });

                    nextBtn.addEventListener("click", () => {
                        if (currentIndex < order.length - 1) showPage(order[currentIndex + 1]);
                    });

                    showPage(order[0]);

                });
            </script>
            <script>
                /* =========================
                   AUDIO – MIKROFON + ECHO
                ========================= */
                let audioContext;
                let micStream;
                let micSource;
                let inputGain;

                let delayNode;
                let feedbackGain;
                let echoGain;

                let isMicOn = false;
                let isEchoOn = false;

                const micBtn = document.getElementById("btn-mic");
                const echoBtn = document.getElementById("btn-echo");

                micBtn.addEventListener("click", async () => {
                    if (!isMicOn) {
                        try {
                            micStream = await navigator.mediaDevices.getUserMedia({
                                audio: { echoCancellation: false, noiseSuppression: false, autoGainControl: false }
                            });

                            audioContext = new (window.AudioContext || window.webkitAudioContext)();
                            micSource = audioContext.createMediaStreamSource(micStream);

                            inputGain = audioContext.createGain();
                            inputGain.gain.value = 1.2;

                            delayNode = audioContext.createDelay(5.0);
                            delayNode.delayTime.value = 0.4;

                            feedbackGain = audioContext.createGain();
                            feedbackGain.gain.value = 0.35;

                            echoGain = audioContext.createGain();
                            echoGain.gain.value = 0; // echo OFF

                            micSource.connect(inputGain);
                            inputGain.connect(audioContext.destination);

                            inputGain.connect(delayNode);
                            delayNode.connect(feedbackGain);
                            feedbackGain.connect(delayNode);
                            delayNode.connect(echoGain);
                            echoGain.connect(audioContext.destination);

                            micBtn.textContent = "Matikan Mikrofon";
                            echoBtn.textContent = "Gema OFF";
                            isMicOn = true;
                            startWaveVisual();
                        } catch (err) {
                            alert("Mikrofon tidak dapat diakses.");
                        }
                    } else {
                        micSource.disconnect();
                        micStream.getTracks().forEach(t => t.stop());
                        audioContext.close();

                        micBtn.textContent = "Aktifkan Mikrofon";
                        echoBtn.textContent = "Gema OFF";
                        isMicOn = false;
                        isEchoOn = false;
                        stopWaveVisual();
                    }
                });

                echoBtn.addEventListener("click", () => {
                    if (!isMicOn) return;

                    if (!isEchoOn) {
                        echoGain.gain.value = 0.6;
                        echoBtn.textContent = "Gema ON";
                        isEchoOn = true;
                    } else {
                        echoGain.gain.value = 0;
                        echoBtn.textContent = "Gema OFF";
                        isEchoOn = false;
                    }
                });

                /* =========================
                   VISUAL GELOMBANG
                ========================= */
                const canvas = document.getElementById("waveCanvas");
                const ctx = canvas.getContext("2d");

                let analyser;
                let dataArray;
                let animationId;

                function startWaveVisual() {
                    analyser = audioContext.createAnalyser();
                    analyser.fftSize = 2048;

                    const bufferLength = analyser.fftSize;
                    dataArray = new Uint8Array(bufferLength);

                    inputGain.connect(analyser);
                    drawWave();
                }

                function stopWaveVisual() {
                    cancelAnimationFrame(animationId);
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }

                function drawWave() {
                    animationId = requestAnimationFrame(drawWave);

                    analyser.getByteTimeDomainData(dataArray);
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    ctx.strokeStyle = "#e5e7eb";
                    ctx.beginPath();
                    ctx.moveTo(0, canvas.height / 2);
                    ctx.lineTo(canvas.width, canvas.height / 2);
                    ctx.stroke();

                    ctx.lineWidth = 2;
                    ctx.strokeStyle = isEchoOn ? "#dc2626" : "#2563eb";
                    ctx.beginPath();

                    const sliceWidth = canvas.width / dataArray.length;
                    let x = 0;

                    for (let i = 0; i < dataArray.length; i++) {
                        const v = dataArray[i] / 128.0;
                        const y = (v * canvas.height) / 2;
                        i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
                        x += sliceWidth;
                    }

                    ctx.lineTo(canvas.width, canvas.height / 2);
                    ctx.stroke();
                }

                document.getElementById("gema-btn")?.addEventListener("click", () => {

                    const jawaban = parseFloat(
                        document.getElementById("gema-jawaban").value
                    );

                    const feedback = document.getElementById("gema-feedback");

                    const kunci = 340;
                    // s = v × t / 2
                    // s = 340 × 2 / 2 = 340 m

                    if (isNaN(jawaban)) {
                        feedback.textContent = "Masukkan jawaban terlebih dahulu.";
                        feedback.style.color = "#b91c1c";
                        return;
                    }

                    if (Math.abs(jawaban - kunci) < 5) {
                        feedback.textContent = "Benar! Jarak ke tebing adalah 340 meter.";
                        feedback.style.color = "#059669";
                    } else {
                        feedback.textContent = "Periksa kembali rumus s = v × t / 2.";
                        feedback.style.color = "#b91c1c";
                    }

                });

                /* =========================
        NAV LEVEL 2 (TAB LATIHAN)
        ========================= */
                document.querySelectorAll(".latihan-tab-btn").forEach(btn => {

                    btn.addEventListener("click", () => {

                        const wrapper = btn.closest(".latihan-tabs-wrapper");
                        const target = btn.dataset.target;

                        // reset tombol aktif
                        wrapper.querySelectorAll(".latihan-tab-btn")
                            .forEach(b => b.classList.remove("latihan-tab-active"));

                        btn.classList.add("latihan-tab-active");

                        // sembunyikan semua halaman tab
                        wrapper.querySelectorAll(".latihan-tab-page")
                            .forEach(p => p.classList.remove("latihan-tab-page-active"));

                        // tampilkan target
                        wrapper.querySelector("#" + target)
                            .classList.add("latihan-tab-page-active");

                    });

                });

            </script>

    @endsection