@extends('layouts.siswa')

@section('title', 'Sifat-Sifat Cahaya')

@section("style")
    <style>
        .soal-card {
            background: #ffffff;
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: 0.2s;
        }

        .soal-card:hover {
            transform: translateY(-2px);
        }

        select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-top: 8px;
            font-size: 14px;
        }

        .inner-nav-btn.active {
            background: #0f766e !important;
            color: #fff !important;
        }

        .next-btn {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .next-btn:hover {
            opacity: 0.9;
        }

        .refraction-simulation {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .simulation-stage {
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
        }

        #opticsSvg {
            max-width: 100%;
            height: auto;
        }

        .control-panel {
            width: 250px;
        }

        .simulation-info {
            margin-top: 15px;
            padding: 12px;
            border-radius: 10px;
            background: #f3f4f6;
        }

        #pencilTop,
        #pencilBottom,
        #waterRect,
        #surfaceLine {
            transition: all .35s ease-in-out;
        }
    </style>

@endsection

@section('siswa-content')

    <div class="materi-gelombang">

        {{-- ==================== KONTEN ==================== --}}
        <main class="content">

            <h1>Sifat-Sifat Cahaya</h1>

            <div class="box">

                {{-- PAGE 1 --}}
                <section id="page-lurus" class="subpage">
                    <h3>Cahaya Merambat Lurus</h3>

                    <p>
                        Salah satu sifat utama cahaya adalah <b>merambat lurus</b>. Artinya, cahaya bergerak mengikuti
                        lintasan garis lurus selama merambat pada medium yang sama dan homogen.
                    </p>

                    <p>
                        Sifat ini dapat diamati dengan mudah dalam kehidupan sehari-hari. Ketika cahaya berasal dari suatu
                        sumber, seperti lampu atau Matahari, cahaya tersebut akan merambat lurus hingga mengenai suatu benda
                        atau penghalang.
                    </p>

                    <div class="box-diff">
                        <b>Inti konsep:</b><br>
                        Cahaya akan merambat lurus selama tidak mengalami pemantulan, pembiasan, atau hamburan.
                    </div>

                    <!-- ====================
                                                                                                            CONTOH DALAM KEHIDUPAN SEHARI-HARI
                                                                                                            ==================== -->
                    <div class="example-row">

                        <!-- KIRI: TEKS -->
                        <div class="example-text">
                            <p><b>Contoh peristiwa cahaya merambat lurus:</b></p>
                            <ul>
                                <li>Terbentuknya bayangan di belakang benda yang terkena cahaya.</li>
                                <li>Berkas cahaya senter tampak lurus saat diarahkan ke depan.</li>
                                <li>Sinar Matahari yang masuk melalui celah jendela membentuk garis lurus.</li>
                            </ul>
                        </div>

                        <!-- KANAN: VISUAL -->
                        <div class="example-image">
                            <!-- Ganti src sesuai aset kamu -->
                            <img src="{{ asset('images/merambat_lurus.png') }}" alt="Pita suara manusia bergetar"
                                style="max-width:380px; width:100%; height:auto;">
                            <p class="image-caption">
                                Cahaya merambat lurus dan membentuk bayangan ketika terhalang oleh benda.
                            </p>
                        </div>

                    </div>

                    <!-- ====================
                                                                                                            PENJELASAN BAYANGAN
                                                                                                            ==================== -->
                    <p style="margin-top:12px;">
                        Karena cahaya merambat lurus, benda yang tidak dapat ditembus cahaya akan menghalangi rambatan
                        cahaya tersebut. Akibatnya, terbentuk daerah gelap di belakang benda yang disebut <b>bayangan</b>.
                    </p>

                    <div class="box-doff">
                        <b>Kesimpulan:</b><br>
                        Sifat cahaya merambat lurus menyebabkan terbentuknya bayangan dan menjadi dasar berbagai fenomena
                        optik dalam kehidupan sehari-hari.
                    </div>
                </section>

                {{-- PAGE 2 --}}
                <section id="page-pantul" class="subpage" style="display:none;">
                    <h3>Pemantulan Cahaya</h3>

                    <p>
                        <b>Pemantulan cahaya</b> adalah peristiwa kembalinya cahaya ke medium semula setelah mengenai suatu
                        permukaan. Pemantulan terjadi ketika cahaya mengenai benda yang tidak dapat ditembus oleh cahaya,
                        seperti cermin atau permukaan logam.
                    </p>

                    <p>
                        Arah rambat cahaya sebelum dan sesudah pemantulan mengikuti aturan tertentu yang dikenal sebagai
                        <b>hukum pemantulan cahaya</b>.
                    </p>

                    <div class="box-diff">
                        <b>Hukum pemantulan cahaya:</b>
                        <ol>
                            <li>Sinar datang, sinar pantul, dan garis normal terletak pada satu bidang datar.</li>
                            <li>Sudut datang sama dengan sudut pantul.</li>
                        </ol>
                    </div>

                    <!-- ====================
                                                                                                            JENIS PEMANTULAN
                                                                                                            ==================== -->
                    <p style="margin-top:12px;">
                        Berdasarkan keadaan permukaannya, pemantulan cahaya dibedakan menjadi dua jenis, yaitu pemantulan
                        teratur dan pemantulan baur.
                    </p>

                    <div class="example-row">

                        <!-- KIRI: TEKS -->
                        <div class="example-text">
                            <p><b>1. Pemantulan Teratur</b></p>
                            <p>
                                Pemantulan teratur terjadi pada permukaan yang halus dan rata, seperti cermin datar. Berkas
                                cahaya yang datang sejajar akan dipantulkan kembali secara sejajar sehingga bayangan dapat
                                terlihat jelas.
                            </p>

                            <p><b>2. Pemantulan Baur</b></p>
                            <p>
                                Pemantulan baur terjadi pada permukaan yang kasar, seperti dinding atau kertas. Cahaya
                                dipantulkan ke berbagai arah sehingga bayangan tidak terlihat jelas.
                            </p>
                        </div>

                        <!-- KANAN: VISUAL -->
                        <div class="example-image">
                            <!-- Ganti src sesuai aset kamu -->
                            <img src="{{ asset('images/pemantulan_cahaya.png') }}"
                                alt="Pemantulan teratur dan pemantulan baur"
                                style="max-width:480px; width:100%; height:auto;">
                            <p class="image-caption">
                                Perbedaan pemantulan teratur dan pemantulan baur.
                            </p>
                        </div>

                    </div>

                    <!-- ====================
                            CONTOH DALAM KEHIDUPAN SEHARI-HARI
                            ==================== -->
                    <div class="box-diff" style="margin-top:12px;">
                        <p><b>Contoh pemantulan cahaya dalam kehidupan sehari-hari:</b></p>
                        <ul>
                            <li>Melihat bayangan wajah pada cermin.</li>
                            <li>Pantulan cahaya lampu pada permukaan air yang tenang.</li>
                            <li>Cahaya senter yang dipantulkan oleh permukaan logam.</li>
                        </ul>
                    </div>

                    <div class="note-box" style="margin-top:12px;">
                        <b>Kesimpulan:</b><br>
                        Pemantulan cahaya mengikuti hukum pemantulan dan bergantung pada jenis permukaan benda yang dikenai
                        cahaya.
                    </div>
                </section>

                {{-- PAGE 3 --}}
                <section id="page-bias" class="subpage" style="display:none;">
                    <h3>Pembiasan Cahaya</h3>

                    <p>
                        <b>Pembiasan cahaya</b> adalah peristiwa <b>pembelokan arah rambat cahaya</b> ketika cahaya
                        berpindah dari satu medium ke medium lain yang memiliki kerapatan optik berbeda.
                    </p>

                    <p>
                        Pembiasan terjadi karena <b>kecepatan cahaya berbeda</b> pada setiap medium. Saat cahaya memasuki
                        medium yang berbeda, arah rambatnya akan berubah.
                    </p>

                    <div class="note-box">
                        <b>Inti konsep:</b><br>
                        Pembiasan cahaya terjadi akibat perubahan kecepatan cahaya saat berpindah medium.
                    </div><br>

                    <div class="box-diff" style="margin-bottom:20px;">

                        <h4>Skenario Pengamatan</h4>

                        <p>
                            Perhatikan gambar pensil di dalam gelas. Geser <b>slider volume air</b>
                            secara perlahan dari 0% hingga 100%.
                        </p>

                        <ol>
                            <li>Amati perubahan posisi pensil saat volume air berubah.</li>
                            <li>Perhatikan bagian pensil yang berada di dalam air.</li>
                            <li>Bacalah penjelasan yang muncul pada setiap perubahan.</li>
                            <li>Tarik kesimpulan mengapa pensil tampak bengkok.</li>
                        </ol>

                    </div>

                    <div class="refraction-simulation">

                        <div class="simulation-stage">

                            <svg id="opticsSvg" viewBox="0 0 700 420" width="700" height="420">

                                <!-- BACKGROUND -->
                                <rect x="0" y="0" width="700" height="420" fill="#ffffff" />

                                <!-- BATAS AIR -->
                                <line id="surfaceLine" x1="0" y1="210" x2="700" y2="210" stroke="#2da8ff"
                                    stroke-width="3" />

                                <!-- GELAS -->

                                <rect x="210" y="80" width="160" height="250" rx="10" fill="none" stroke="#666"
                                    stroke-width="4" />

                                <!-- AIR -->

                                <rect id="waterRect" x="214" y="210" width="152" height="120" fill="#8dd8ff" opacity=".6" />

                                <!-- BAGIAN ATAS PENSIL -->

                                <line id="pencilTop" x1="300" y1="40" x2="260" y2="210" stroke="#d28b36" stroke-width="12"
                                    stroke-linecap="round" />

                                <!-- BAGIAN BAWAH PENSIL -->

                                <line id="pencilBottom" x1="260" y1="210" x2="220" y2="330" stroke="#d28b36"
                                    stroke-width="12" stroke-linecap="round" />

                            </svg>

                        </div>

                        <div class="control-panel">

                            <h4>Volume Air</h4>

                            <input type="range" id="waterSlider" min="0" max="100" value="50">

                            <p>

                                Volume :
                                <span id="waterValue">
                                    50
                                </span> %

                            </p>

                            <div class="simulation-info">

                                <h5>Hasil Pengamatan</h5>

                                <p id="observationText">

                                    Geser slider untuk mulai melakukan pengamatan.

                                </p>

                            </div>

                            <div class="simulation-info" style="margin-top:15px;">

                                <h5>Penjelasan Konsep</h5>

                                <p id="conceptText">

                                    Penjelasan mengenai pembiasan cahaya akan muncul di sini.

                                </p>

                            </div>

                        </div>

                    </div>
                    <br>
                    <div class="box-diff" style="margin-bottom:20px;">

                        <h4>Kesimpulan Pengamatan</h4>

                        <p>

                            Meskipun pensil sebenarnya tetap lurus,
                            bagian pensil yang berada di dalam air tampak bergeser.

                            Hal ini terjadi karena cahaya dari pensil
                            mengalami pembiasan ketika berpindah dari
                            air menuju udara sebelum mencapai mata.

                        </p>

                    </div>
                    {{-- <p style="margin-top:12px;">
                        Arah pembiasan cahaya bergantung pada medium yang dimasukinya. Jika cahaya masuk ke medium yang
                        lebih rapat secara optik, cahaya akan dibiaskan mendekati garis normal. Sebaliknya, jika cahaya
                        masuk ke medium yang lebih renggang, cahaya akan dibiaskan menjauhi garis normal.
                    </p>

                    <div class="note-box">
                        <b>Kesimpulan:</b><br>
                        Pembiasan cahaya menyebabkan benda tampak tidak pada posisi sebenarnya dan menjadi dasar berbagai
                        fenomena optik.
                    </div> --}}
                </section>

                {{-- PAGE 4 --}}
                <section id="page-dispersi" class="subpage" style="display:none;">
                    <h3>Dispersi Cahaya</h3>

                    <p>
                        <b>Dispersi cahaya</b> adalah peristiwa <b>penguraian cahaya putih</b> menjadi berbagai warna
                        penyusunnya ketika cahaya tersebut mengalami pembiasan.
                    </p>

                    <p>
                        Peristiwa dispersi terjadi karena setiap warna cahaya memiliki <b>panjang gelombang dan kecepatan
                            rambat yang berbeda</b> di dalam suatu medium. Akibatnya, setiap warna cahaya dibiaskan dengan
                        sudut yang berbeda.
                    </p>

                    <div class="note-box">
                        <b>Inti konsep:</b><br>
                        Dispersi cahaya terjadi karena perbedaan pembiasan tiap warna cahaya.
                    </div>

                    <!-- ====================
                                                                                                            SPEKTRUM WARNA CAHAYA
                                                                                                            ==================== -->
                    <div class="box-diff" style="margin-top:12px; text-align:center;">
                        <p><b>Spektrum cahaya tampak terdiri atas tujuh warna, yaitu:</b></p>

                        <p style="font-weight:700; letter-spacing:0.5px;">
                            <span style="color:#dc2626;">Merah</span> –
                            <span style="color:#f97316;">Jingga</span> –
                            <span style="color:#facc15;">Kuning</span> –
                            <span style="color:#22c55e;">Hijau</span> –
                            <span style="color:#2563eb;">Biru</span> –
                            <span style="color:#4f46e5;">Nila</span> –
                            <span style="color:#9333ea;">Ungu</span>
                        </p>
                    </div>


                    <!-- ====================
                                                                                                            CONTOH DALAM KEHIDUPAN SEHARI-HARI
                                                                                                            ==================== -->
                    <div class="example-row">

                        <!-- KIRI: TEKS -->
                        <div class="example-text">
                            <p><b>Contoh peristiwa dispersi cahaya:</b></p>
                            <ul>
                                <li>Terbentuknya pelangi setelah hujan.</li>
                                <li>Cahaya putih yang dilewatkan melalui prisma kaca.</li>
                                <li>Pantulan cahaya pada tetesan air yang menghasilkan warna-warni.</li>
                            </ul>
                        </div>

                        <!-- KANAN: VISUAL -->
                        <div class="example-image">
                            <!-- Ganti src sesuai aset kamu -->
                            <img src="{{ asset('images/dispersi_cahaya.png') }}" alt="Dispersi cahaya oleh prisma"
                                style="max-width:480px; width:100%; height:auto;">
                            <p class="image-caption">
                                Cahaya putih terurai menjadi spektrum warna saat melewati prisma.
                            </p>
                        </div>

                    </div>

                    <!-- ====================
                            KETERKAITAN DENGAN PEMBIASAN
                            ==================== -->
                    <p style="margin-top:12px;">
                        Dispersi cahaya merupakan akibat dari pembiasan cahaya. Karena setiap warna memiliki panjang
                        gelombang yang berbeda, maka sudut pembiasannya pun berbeda. Hal inilah yang menyebabkan cahaya
                        putih dapat terurai menjadi berbagai warna.
                    </p>

                    <div class="note-box">
                        <b>Kesimpulan:</b><br>
                        Dispersi cahaya menjelaskan asal-usul spektrum warna dan menjadi dasar terjadinya pelangi.
                    </div>
                </section>


            </div>

            {{-- NAV --}}
            <div class="inner-navigation">
                <button id="inner-prev" class="next-btn">Previous</button>
                <button class="next-btn inner-nav-btn" data-target="page-lurus">1</button>
                <button class="next-btn inner-nav-btn" data-target="page-pantul">2</button>
                <button class="next-btn inner-nav-btn" data-target="page-bias">3</button>
                <button class="next-btn inner-nav-btn" data-target="page-dispersi">4</button>
                <button id="inner-next" class="next-btn">Next</button>
            </div>

            <button class="next-btn" onclick="location.href='{{ url('pengantar_cahaya') }}'">← Materi Sebelumnya</button>
            <button class="next-btn" onclick="location.href='{{ url('spektrum_cahaya') }}'">Materi Selanjutnya →</button>

        </main>
    </div>

@endsection

@section('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const pages = document.querySelectorAll(".subpage");
            const btns = document.querySelectorAll(".inner-nav-btn");
            const prev = document.getElementById("inner-prev");
            const next = document.getElementById("inner-next");

            const order = ["page-lurus", "page-pantul", "page-bias", "page-dispersi"];
            let idx = 0;

            function show(id) {
                pages.forEach(p => p.style.display = p.id === id ? "block" : "none");
                btns.forEach(b => {
                    b.classList.remove("active");

                    if (b.dataset.target === id) {
                        b.classList.add("active");
                    }
                });
                idx = order.indexOf(id);
                prev.disabled = idx === 0;
                next.disabled = idx === order.length - 1;
            }

            btns.forEach(b => b.onclick = () => show(b.dataset.target));
            prev.onclick = () => idx > 0 && show(order[idx - 1]);
            next.onclick = () => idx < order.length - 1 && show(order[idx + 1]);
            show(order[0]);
        });
    </script>

    <script>
        window.addEventListener("beforeunload", function () {
            kirimProgress("sifat_cahaya", 13);
        });
    </script>

    <script>
        const namaSiswa = "{{ auth()->user()->name }}";
        const nisnSiswa = "{{ auth()->user()->nisn ?? '000000' }}";
    </script>

    <script>

        const slider = document.getElementById("waterSlider");

        const value = document.getElementById("waterValue");

        const info = document.getElementById("simulationInfo");

        const waterRect = document.getElementById("waterRect");
        const pencilTop = document.getElementById("pencilTop");
        const pencilBottom = document.getElementById("pencilBottom");

        const surfaceLine = document.getElementById("surfaceLine");
        const observation = document.getElementById("observationText");
        const concept = document.getElementById("conceptText");
        slider.addEventListener("input", function () {
            const volume = Number(this.value);
            if (volume === 0) {

                observation.innerHTML = `
    Tidak ada air di dalam gelas.
    Pensil terlihat lurus karena cahaya hanya merambat melalui udara.
    `;

                concept.innerHTML = `
    Belum terjadi pembiasan karena cahaya tidak berpindah medium.
    Akibatnya cahaya tetap merambat lurus menuju mata.
    `;

            }

            else if (volume <= 25) {

                observation.innerHTML = `
    Bagian bawah pensil mulai terendam air.
    Pensil mulai tampak sedikit bergeser pada batas permukaan air.
    `;

                concept.innerHTML = `
    Cahaya dari bagian pensil yang berada di dalam air mengalami
    pembiasan ketika keluar menuju udara.
    Akibatnya posisi pensil tampak sedikit berubah.
    `;

            }

            else if (volume <= 50) {

                observation.innerHTML = `
    Semakin banyak bagian pensil berada di dalam air.
    Bagian pensil yang tampak bergeser menjadi semakin panjang.
    `;

                concept.innerHTML = `
    Semakin tinggi permukaan air,
    semakin panjang bagian pensil yang berada di dalam air.
    Akibatnya semakin banyak cahaya yang mengalami pembiasan
    sehingga bagian pensil yang tampak bergeser menjadi lebih jelas.
    `;

            }

            else if (volume <= 75) {

                observation.innerHTML = `
    Sebagian besar pensil berada di dalam air.
    Perbedaan posisi antara bagian atas dan bawah pensil semakin jelas terlihat.
    `;

                concept.innerHTML = `
    Cahaya dari bagian pensil di dalam air
    tetap mengalami pembiasan ketika keluar menuju udara.
    Mata menganggap cahaya merambat lurus,
    sehingga pensil tampak bengkok meskipun sebenarnya tetap lurus.
    `;

            }

            else {

                observation.innerHTML = `
    Hampir seluruh pensil berada di dalam air.
    Pensil tampak paling bengkok dibandingkan kondisi sebelumnya.
    `;

                concept.innerHTML = `
    Pembiasan tidak menjadi lebih besar karena jumlah air bertambah.
    Namun semakin tinggi permukaan air,
    semakin panjang bagian pensil yang mengalami pembiasan,
    sehingga efek visualnya terlihat semakin jelas.
    `;

            }
            value.textContent = volume;

            /*
                Tinggi air:
                0% = 0 px
                100% = 250 px
            */
            const waterHeight = volume * 2.5;
            const topWater = 330 - waterHeight;

            waterRect.setAttribute("y", topWater);
            waterRect.setAttribute("height", waterHeight);
            surfaceLine.setAttribute("y1", topWater);
            surfaceLine.setAttribute("y2", topWater);

            /*
            =========================
            PENSIL (PERBAIKAN PEMBIASAN)
            =========================
            */
            // Titik pangkal atas pensil tetap di (300, 40)
            // Titik ujung bawah (jika tidak ada air/lurus) ada di (220, 330)

            // 1. Cari X titik potong pensil dengan permukaan air (topWater)
            // Rumus gradien (dx / dy) -> (220 - 300) / (330 - 40) = -80 / 290
            const slope = -80 / 290;
            const intersectX = 300 + (topWater - 40) * slope;

            // 2. Set bagian atas pensil (berhenti tepat di permukaan air)
            pencilTop.setAttribute("x2", intersectX);
            pencilTop.setAttribute("y2", topWater);

            // 3. Set bagian bawah pensil (mulai persis dari titik potong permukaan air)
            pencilBottom.setAttribute("x1", intersectX);
            pencilBottom.setAttribute("y1", topWater);

            // 4. Efek bias: ujung bawah pensil terlihat bergeser menjauhi garis normal
            // Semakin banyak volume air, efek pembiasannya semakin besar
            const offsetBias = (volume / 100) * 18; // Angka 18 bisa diubah untuk mengatur seberapa bengkok pensilnya
            pencilBottom.setAttribute("x2", 220 + offsetBias);
            // y2 tetap 330 karena pensil menyentuh dasar gelas
        });

    </script>


@endsection