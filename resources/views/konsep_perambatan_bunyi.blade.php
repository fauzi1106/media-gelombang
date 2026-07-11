@extends('layouts.siswa')

@section('title', 'Konsep Dasar & Perambatan Bunyi')

@section('siswa-content')

  <div class="materi-gelombang">


    <main class="content">
      <h2>Konsep Dasar & Perambatan Bunyi</h2>

      <div class="box">

        <section id="page-konsep" class="subpage">
          <h3>Konsep Dasar Bunyi</h3>

          <p>
            <b>Bunyi</b> adalah salah satu bentuk <b>gelombang mekanik</b>, yaitu gelombang yang
            <b>memerlukan medium</b> (zat perantara) untuk merambat. Bunyi berasal dari
            <b>benda yang bergetar</b>. Getaran tersebut mengganggu medium di sekitarnya sehingga
            gangguan itu merambat dan dapat didengar oleh telinga.
          </p>

          <div class="box-diff">
            <b>Catatan penting:</b> Bunyi <b>tidak dapat merambat di ruang hampa</b> karena tidak ada medium
            yang dapat bergetar dan meneruskan gangguan.
          </div>

          <div class="example-row">

            <div class="example-text">
              <p><b>Contoh sederhana:</b></p>
              <ul>
                <li>Suara manusia terdengar karena pita suara bergetar dan menggetarkan udara.</li>
                <li>Suara gitar terdengar karena senar bergetar dan diteruskan ke udara melalui badan gitar.</li>
              </ul>
            </div>

            <div class="example-image">
              <img src="{{ asset('images/dasar_bunyi.png') }}" alt="Pita suara manusia bergetar"
                style="max-width:280px; width:100%; height:auto;">
              <p class="image-caption">
                Getaran pita suara menyebabkan udara bergetar dan menghasilkan bunyi.
              </p>
            </div>

          </div>
          <h3>Bunyi sebagai Gelombang Longitudinal</h3>

          <p>
            Bunyi pada umumnya merambat sebagai <b>gelombang longitudinal</b>.
            Pada gelombang longitudinal, arah getar partikel medium <b>sejajar</b> dengan arah rambat gelombang.
          </p>

          <p>
            Saat bunyi merambat di udara, partikel udara mengalami:
          </p>
          <ul>
            <li><b>Rapatan</b> (kompresi): daerah dengan partikel lebih rapat.</li>
            <li><b>Regangan</b> (renggangan): daerah dengan partikel lebih renggang.</li>
          </ul>

          <div class="note-box">
            <b>Intinya:</b> Yang berpindah adalah <b>energi bunyi</b>, bukan partikel mediumnya.
            Partikel medium hanya <b>berosilasi</b> di sekitar titik keseimbangannya.
          </div>

          <p style="margin-top:10px;">
            (Opsional untuk Anda tambahkan nanti: gambar/skema rapatan-regangan atau grafik tekanan vs posisi).
          </p>

        </section>

        {{-- halaman medium --}}

        <section id="page-medium" class="subpage" style="display:none;">
          <h3>Visualisasi Gelombang Longitudinal</h3>

          <p>
            Untuk memahami bagaimana rapatan dan regangan merambat, mari kita amati simulasi slinky (pegas) di bawah ini.
          </p>

          <div class="box-diff" style="margin-bottom: 16px;">
            <b>Skenario Simulasi:</b>
            <ol style="margin-top: 8px;">
              <li>Klik dan tahan ikon tangan (✋) di sebelah kiri.</li>
              <li>Tarik tangan sejauh mungkin ke arah <b>kiri</b> (menjauhi pegas) untuk memberikan gaya tarik.</li>
              <li><b>Lepaskan</b> tarikanmu secara tiba-tiba!</li>
              <li>Amati bagaimana area kumparan yang rapat (<b>rapatan</b>) bergerak perlahan dari kiri ke kanan.</li>
            </ol>
            <p style="margin-top: 8px; font-size: 0.95em;">
              <i>Perhatikan bahwa ujung slinky di sebelah kanan tetap di tempat. Yang berpindah dari kiri ke kanan murni
                <b>energinya</b>, bukan slinky-nya secara keseluruhan.</i>
            </p>
          </div>

          <!-- Kanvas diperbesar: width 840, height 280 -->
          <div style="overflow-x: auto; text-align: center;">
            <canvas id="slinkyCanvas" width="840" height="280"
              style="max-width: 100%; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);"></canvas>
          </div>

          <div class="caption">
            Simulasi perambatan gelombang longitudinal pada slinky.
          </div>
        </section>


        <!-- ====================
                        HALAMAN 4 – LATIHAN PEMAHAMAN KONSEP BUNYI
                        ==================== -->
        <section id="page-rumus" class="subpage" style="display:none;">

          <h3>Cepat Rambat Bunyi</h3>

          <p>
            <b>Cepat rambat bunyi</b> adalah kecepatan merambatnya gelombang bunyi
            melalui suatu medium (zat perantara).
            Yang merambat bukan partikel zatnya, melainkan <b>energi getaran</b>.
          </p>

          <div class="note-box">
            Cepat rambat bunyi <b>tidak dipengaruhi keras–lembut bunyi</b>,
            tetapi ditentukan oleh <b>sifat medium</b>.
          </div>

          <h4>Faktor yang Mempengaruhi</h4>
          <ul>
            <li><b>Elastisitas</b> besar → cepat rambat ↑</li>
            <li><b>Massa jenis</b> (ρ) besar → cepat rambat ↓</li>
          </ul>

          <!-- ================= TAB ================= -->
          <div class="latihan-tabs-wrapper">

            <!-- HEADER -->
            <div class="latihan-tabs-header">
              <button class="latihan-tab-btn latihan-tab-active" data-target="cepat-1">
                Zat Padat
              </button>
              <button class="latihan-tab-btn" data-target="cepat-2">
                Zat Cair
              </button>
              <button class="latihan-tab-btn" data-target="cepat-3">
                Gas
              </button>
            </div>

            <!-- ===================== -->
            <!-- TAB 1 : PADAT -->
            <!-- ===================== -->
            <div id="cepat-1" class="latihan-tab-page latihan-tab-page-active">

              <div class="box-diff">
                <h4>a) Bunyi pada Zat Padat</h4>

                <p>
                  Pada zat padat, partikel-partikelnya sangat rapat dan terikat kuat,
                  sehingga getaran dapat diteruskan sangat cepat.
                </p>

                <p><b>Rumus:</b></p>
                <div style="text-align:center; margin:8px 0;">
                  $$ v = \sqrt{\frac{E}{\rho}} $$
                </div>

                <p><b>Keterangan:</b></p>
                <ul>
                  <li>v = cepat rambat bunyi (m/s)</li>
                  <li>E = modulus elastisitas (Pa)</li>
                  <li>ρ = massa jenis (kg/m³)</li>
                </ul>

                <p>
                  Semakin elastis dan semakin ringan bahannya,
                  maka bunyi merambat semakin cepat.
                </p>
              </div>

            </div>

            <!-- ===================== -->
            <!-- TAB 2 : CAIR -->
            <!-- ===================== -->
            <div id="cepat-2" class="latihan-tab-page">

              <div class="box-diff">
                <h4>b) Bunyi pada Zat Cair</h4>

                <p>
                  Partikel zat cair lebih renggang dibanding padat,
                  sehingga bunyi merambat lebih lambat.
                </p>

                <p><b>Rumus:</b></p>
                <div style="text-align:center; margin:8px 0;">
                  $$ v = \sqrt{\frac{B}{\rho}} $$
                </div>

                <p><b>Keterangan:</b></p>
                <ul>
                  <li>v = cepat rambat bunyi (m/s)</li>
                  <li>B = modulus bulk (Pa)</li>
                  <li>ρ = massa jenis (kg/m³)</li>
                </ul>

                <p>
                  Semakin sulit zat cair dimampatkan,
                  maka bunyi merambat semakin cepat.
                </p>
              </div>

            </div>

            <!-- ===================== -->
            <!-- TAB 3 : GAS -->
            <!-- ===================== -->
            <div id="cepat-3" class="latihan-tab-page">

              <div class="box-diff">
                <h4>c) Bunyi pada Gas</h4>

                <p>
                  Pada gas, jarak antarpartikel sangat jauh,
                  sehingga bunyi merambat paling lambat.
                  Cepat rambat dipengaruhi suhu.
                </p>

                <p><b>Rumus (udara):</b></p>
                <div style="text-align:center; margin:8px 0;">
                  $$ v \approx 331 + 0{,}6T $$
                </div>

                <p><b>Keterangan:</b></p>
                <ul>
                  <li>v = cepat rambat bunyi (m/s)</li>
                  <li>T = suhu (°C)</li>
                </ul>

                <p>
                  Jika suhu naik, energi partikel bertambah,
                  sehingga bunyi merambat lebih cepat.
                </p>
              </div>

            </div>

          </div>
          <br>
          <div class="box-diff">
            <b>Ringkasan:</b><br>
            Padat → Cair → Gas<br>
            Suhu naik → cepat rambat naik
          </div>

          <hr style="margin:30px 0;">

        </section>


        <!-- ====================
                                                                         HALAMAN 4 – CEPAT RAMBAT BUNYI
                                                                        ==================== -->
        <section id="page-latihan" class="subpage" style="display:none;">
          <div id="area-pdf">
            <h3>Latihan Cepat Rambat Bunyi</h3>

            <p>
              Kerjakan latihan berikut setelah memahami rumus cepat rambat bunyi.
              Tuliskan besaran yang diketahui dan yang ditanyakan sebelum menghitung.
            </p>

            <div class="latihan-tabs-wrapper">

              <!-- ================= TAB HEADER ================= -->
              <div class="latihan-tabs-header">
                <button class="latihan-tab-btn latihan-tab-active" data-target="latihan-1">
                  Zat Padat
                </button>
                <button class="latihan-tab-btn" data-target="latihan-2">
                  Zat Cair
                </button>
                <button class="latihan-tab-btn" data-target="latihan-3">
                  Gas
                </button>
              </div>

              <!-- =================================================
                            TAB 1 — ZAT PADAT
                            ================================================= -->
              <div id="latihan-1" class="latihan-tab-page latihan-tab-page-active">

                <!-- CONTOH -->
                <div class="box-diff">
                  <p><b>Contoh Soal – Cepat Rambat Bunyi pada Zat Padat</b></p>

                  <!-- SOAL CONTOH -->
                  <p>
                    Sebuah batang logam memiliki modulus elastisitas
                    <b>E = 2 × 10¹¹ N/m²</b> dan massa jenis
                    <b>ρ = 8.000 kg/m³</b>.
                    Tentukan cepat rambat bunyi pada batang logam tersebut.
                  </p>

                  <p><b>Diketahui:</b></p>
                  <ul>
                    <li>E = 2 × 10¹¹ N/m²</li>
                    <li>ρ = 8.000 kg/m³</li>
                  </ul>

                  <p><b>Ditanyakan:</b></p>
                  <p>v = ... ?</p>

                  <p><b>Penyelesaian:</b></p>
                  <p>
                    Rumus cepat rambat bunyi pada zat padat:
                    <br><b>v = √(E / ρ)</b>
                  </p>
                  <p>
                    v = √(2 × 10¹¹ / 8000)
                    <br>v ≈ <b>5000 m/s</b>
                  </p>
                </div>


                <!-- LATIHAN -->
                <div class="box-diff" style="margin-top:16px;">
                  <p><b>Soal 1 – Zat Padat</b></p>

                  <!-- BLOK SOAL -->
                  <p>
                    Sebuah bahan padat memiliki modulus elastisitas
                    <b>E = 9 × 10¹⁰ N/m²</b> dan massa jenis
                    <b>ρ = 9000 kg/m³</b>.
                    Tentukan cepat rambat bunyi pada bahan tersebut.
                  </p>

                  <p><b>Diketahui:</b></p>
                  <p>
                    E =
                    <input type="text" id="padat-E" style="width:120px;">
                    N/m²
                  </p>
                  <p>
                    ρ =
                    <input type="text" id="padat-rho" style="width:120px;">
                    kg/m³
                  </p>

                  <p><b>Ditanyakan:</b></p>
                  <p>v = ... ?</p>

                  <p><b>Jawaban:</b></p>
                  <p>
                    v =
                    <input type="number" id="padat-jawaban" style="width:100px;"> m/s
                    <button class="next-btn" id="padat-btn">Cek Jawaban</button>
                  </p>

                  <p id="padat-feedback"></p>
                </div>

              </div>

              <!-- =================================================
                            TAB 2 — ZAT CAIR
                            ================================================= -->
              <div id="latihan-2" class="latihan-tab-page">

                <!-- CONTOH -->
                <div class="box-diff">
                  <p><b>Contoh Soal – Cepat Rambat Bunyi pada Zat Cair</b></p>
                  <p>
                    Sebuah zat cair memiliki modulus bulk
                    <b>B = 2,2 × 10⁹ N/m²</b> dan massa jenis
                    <b>ρ = 1000 kg/m³</b>.
                    Hitung cepat rambat bunyi pada zat cair tersebut.
                  </p>

                  <p><b>Diketahui:</b></p>
                  <ul>
                    <li>B = 2,2 × 10⁹ N/m²</li>
                    <li>ρ = 1000 kg/m³</li>
                  </ul>

                  <p><b>Ditanyakan:</b></p>
                  <p>v = ... ?</p>

                  <p><b>Penyelesaian:</b></p>
                  <p>
                    v = √(B / ρ)<br>
                    v ≈ <b>1480 m/s</b>
                  </p>
                </div>

                <!-- LATIHAN -->
                <div class="box-diff" style="margin-top:16px;">
                  <p><b>Soal 2 – Zat Cair</b></p>

                  <!-- KALIMAT SOAL -->
                  <p>
                    Sebuah zat cair memiliki modulus bulk
                    <b>B = 1,6 × 10⁹ N/m²</b>
                    dan massa jenis
                    <b>ρ = 1000 kg/m³</b>.
                    Tentukan cepat rambat bunyi pada zat cair tersebut.
                  </p>

                  <p><b>Diketahui:</b></p>

                  <p>
                    B =
                    <input type="text" id="cair-B" style="width:120px;">
                    N/m²
                  </p>

                  <p>
                    ρ =
                    <input type="text" id="cair-rho" style="width:120px;">
                    kg/m³
                  </p>

                  <p><b>Ditanyakan:</b></p>
                  <p>v = … ?</p>

                  <p><b>Jawaban:</b></p>
                  <p>
                    v =
                    <input type="number" id="cair-jawaban" style="width:100px;"> m/s
                    <button class="next-btn" id="cair-btn">Cek Jawaban</button>
                  </p>

                  <p id="cair-feedback"></p>
                </div>


              </div>


              <!-- =================================================
                                TAB 3 — GAS
                                ================================================= -->
              <div id="latihan-3" class="latihan-tab-page">

                <!-- CONTOH -->
                <div class="box-diff">
                  <p><b>Contoh Soal – Cepat Rambat Bunyi di Udara</b></p>
                  <p>
                    Suhu udara di suatu tempat adalah
                    <b>20°C</b>.
                    Tentukan cepat rambat bunyi di udara pada suhu tersebut.
                  </p>

                  <p><b>Diketahui:</b></p>
                  <ul>
                    <li>T = 20°C</li>
                  </ul>

                  <p><b>Ditanyakan:</b></p>
                  <p>v = ... ?</p>

                  <p><b>Penyelesaian:</b></p>
                  <p>
                    v ≈ 331 + 0,6T<br>
                    v = 331 + (0,6 × 20)<br>
                    v = <b>343 m/s</b>
                  </p>
                </div>

                <!-- LATIHAN -->
                <div class="box-diff" style="margin-top:16px;">
                  <p><b>Soal 3 – Gas</b></p>

                  <!-- KALIMAT SOAL -->
                  <p>
                    Suhu udara di suatu tempat adalah
                    <b>30°C</b>.
                    Tentukan cepat rambat bunyi di udara pada suhu tersebut.
                  </p>

                  <p><b>Diketahui:</b></p>

                  <p>
                    T =
                    <input type="text" id="gas-T" style="width:120px;">
                    °C
                  </p>

                  <p><b>Ditanyakan:</b></p>
                  <p>v = … ?</p>

                  <p><b>Jawaban:</b></p>
                  <p>
                    v =
                    <input type="number" id="gas-jawaban" style="width:100px;"> m/s
                    <button class="next-btn" id="gas-btn">Cek Jawaban</button>
                  </p>

                  <p id="gas-feedback"></p>
                </div>
              </div>

            </div>
            <div style="margin-top:20px; text-align:center;">
              <button id="download-pdf-btn" class="next-btn" style="display:none;">
                📄 Download Hasil Latihan Bunyi (PDF)
              </button>
            </div>
            <div style="margin-top:25px; text-align:center;">
              @if(session('success'))
                <div style="color:#059669; font-weight:600; margin-bottom:10px;">
                  {{ session('success') }}
                </div>
              @endif

            </div>
          </div>
        </section>
      </div>
      <!-- =========================
                      NAVIGASI HALAMAN INTERNAL
                      ========================= -->
      <div class="inner-navigation">
        <button id="inner-prev" class="next-btn">Previous</button>

        <button class="next-btn inner-nav-btn" data-target="page-konsep">1</button>
        <button class="next-btn inner-nav-btn" data-target="page-medium">2</button>
        <button class="next-btn inner-nav-btn" data-target="page-rumus">3</button>
        <button class="next-btn inner-nav-btn" data-target="page-latihan">4</button>

        <button id="inner-next" class="next-btn">Next</button>
      </div>

      <button class="next-btn" onclick="location.href='{{ url('pengantar_bunyi') }}'">
        ← Materi Sebelumnya
      </button>

      <button class="next-btn" onclick="location.href='{{ url('sumber_kar_bunyi') }}'">
        Materi Selanjutnya →
      </button>

    </main>
  </div>

@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {

      const hasil = {
        padat: null,
        cair: null,
        gas: null
      };

      const status = {

        padat: false,
        cair: false,
        gas: false

      };

      const downloadBtn = document.getElementById("download-pdf-btn");

      function cekSelesai() {

        if (
          status.padat &&
          status.cair &&
          status.gas
        ) {

          downloadBtn.style.display = "inline-block";

        } else {

          downloadBtn.style.display = "none";

        }

      }

      /* =============================
         GENERATE PDF
         ============================= */
      downloadBtn.addEventListener("click", async () => {

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        let y = 15;

        pdf.setFontSize(16);
        pdf.text("HASIL LATIHAN CEPAT RAMBAT BUNYI", 14, y);
        y += 10;

        pdf.setFontSize(12);
        pdf.text("Materi: Konsep Dasar & Perambatan Bunyi", 14, y);
        y += 12;

        Object.values(hasil).forEach((item) => {

          pdf.setFont(undefined, "bold");
          pdf.text(item.judul, 14, y);
          y += 8;

          pdf.setFont(undefined, "normal");

          pdf.text("Soal:", 14, y);
          y += 6;
          pdf.text(item.soal, 18, y, { maxWidth: 170 });
          y += 10;

          pdf.text("Diketahui:", 14, y);
          y += 6;
          pdf.text(item.diketahui, 18, y);
          y += 8;

          pdf.text("Ditanyakan:", 14, y);
          y += 6;
          pdf.text(item.ditanyakan, 18, y);
          y += 8;

          pdf.text("Jawaban Siswa:", 14, y);
          y += 6;
          pdf.text(item.jawabanSiswa, 18, y);
          y += 8;

          pdf.text("Jawaban Benar:", 14, y);
          y += 6;
          pdf.text(item.jawabanBenar, 18, y);

          y += 12;

          if (y > 260) {
            pdf.addPage();
            y = 20;
          }

        });

        const blob = pdf.output("blob");

        const formData = new FormData();

        formData.append(
          "file",
          blob,
          "hasil_latihan_cepat_rambat_bunyi.pdf"
        );

        formData.append(
          "latihan_code",
          "L21"
        );

        const response = await fetch("/pengumpulan-gelombang", {

          method: "POST",

          headers: {
            "X-CSRF-TOKEN":
              document.querySelector('meta[name="csrf-token"]').content
          },

          body: formData

        });

        if (response.ok) {

          pdf.save("hasil_latihan_cepat_rambat_bunyi.pdf");

        } else {

          alert("PDF gagal disimpan.");

        }
      });
      function feedback(id, benar, teks) {
        const el = document.getElementById(id);
        if (!el) return;
        el.textContent = teks;
        el.style.fontWeight = "600";
        el.style.color = benar ? "#059669" : "#b91c1c";
      }

      // zat padat
      document.getElementById("padat-btn")?.addEventListener("click", () => {

        const E = document.getElementById("padat-E").value;
        const rho = document.getElementById("padat-rho").value;
        const v = parseFloat(document.getElementById("padat-jawaban").value);

        const kunci = 3162;

        if (!E || !rho || isNaN(v)) {
          feedback("padat-feedback", false, "Lengkapi semua nilai terlebih dahulu.");
          return;
        }

        if (Math.abs(v - kunci) < 50) {

          status.padat = true;

          hasil.padat = {

            judul: "Soal 1 – Cepat Rambat Bunyi pada Zat Padat",

            soal: "Bahan padat memiliki E = 9 × 10¹⁰ N/m² dan ρ = 9000 kg/m³.",

            diketahui: `E=${E}, ρ=${rho}`,

            ditanyakan: "v = ... ?",

            jawabanSiswa: v + " m/s",

            jawabanBenar: "3162 m/s"

          };

          feedback(
            "padat-feedback",
            true,
            "Benar! v ≈ 3162 m/s."
          );

        } else {

          status.padat = false;

          hasil.padat = null;

          feedback(
            "padat-feedback",
            false,
            "Periksa kembali rumus v = √(E / ρ)."
          );

        }

        cekSelesai();

      });

      // zat cair
      document.getElementById("cair-btn")?.addEventListener("click", () => {

        const B = document.getElementById("cair-B").value;
        const rho = document.getElementById("cair-rho").value;
        const v = parseFloat(document.getElementById("cair-jawaban").value);

        const kunci = 1265;

        if (!B || !rho || isNaN(v)) {
          feedback(
            "cair-feedback",
            false,
            "Lengkapi semua nilai terlebih dahulu."
          );
          return;
        }

        if (Math.abs(v - kunci) < 30) {

          status.cair = true;

          hasil.cair = {

            judul: "Soal 2 – Cepat Rambat Bunyi pada Zat Cair",

            soal: "Zat cair memiliki B = 1,6 × 10⁹ N/m² dan ρ = 1000 kg/m³.",

            diketahui: `B = ${B} N/m², ρ = ${rho} kg/m³`,

            ditanyakan: "v = ... ?",

            jawabanSiswa: v + " m/s",

            jawabanBenar: "1265 m/s"

          };

          feedback(
            "cair-feedback",
            true,
            "Benar! v ≈ 1265 m/s."
          );

        } else {

          status.cair = false;

          hasil.cair = null;

          feedback(
            "cair-feedback",
            false,
            "Gunakan rumus v = √(B / ρ)."
          );

        }

        cekSelesai();

      });
      // GAS
      document.getElementById("gas-btn")?.addEventListener("click", () => {

        const T = document.getElementById("gas-T").value;
        const v = parseFloat(document.getElementById("gas-jawaban").value);

        const kunci = 349;

        if (!T || isNaN(v)) {

          feedback(
            "gas-feedback",
            false,
            "Lengkapi semua nilai terlebih dahulu."
          );

          return;

        }

        if (Math.abs(v - kunci) < 1) {

          status.gas = true;

          hasil.gas = {

            judul: "Soal 3 – Cepat Rambat Bunyi di Udara",

            soal: "Suhu udara di suatu tempat adalah 30°C.",

            diketahui: `T = ${T} °C`,

            ditanyakan: "v = ... ?",

            jawabanSiswa: v + " m/s",

            jawabanBenar: "349 m/s"

          };

          feedback(
            "gas-feedback",
            true,
            "Benar! v = 331 + 0,6 × 30 = 349 m/s."
          );

        } else {

          status.gas = false;

          hasil.gas = null;

          feedback(
            "gas-feedback",
            false,
            "Gunakan rumus v ≈ 331 + 0,6T."
          );

        }

        cekSelesai();

      });

      const pages = document.querySelectorAll(".subpage");
      const navBtns = document.querySelectorAll(".inner-nav-btn");
      const prevBtn = document.getElementById("inner-prev");
      const nextBtn = document.getElementById("inner-next");

      const order = [
        "page-konsep",
        "page-medium",
        "page-rumus",
        "page-latihan"
      ];


      let currentIndex = 0;

      function showPage(id) {
        pages.forEach(p => {
          p.style.display = (p.id === id) ? "block" : "none";
        });

        navBtns.forEach(btn => {
          const active = btn.dataset.target === id;
          btn.classList.toggle("active", active);
        });

        currentIndex = order.indexOf(id);
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === order.length - 1;
      }

      navBtns.forEach(btn => {
        btn.addEventListener("click", () => showPage(btn.dataset.target));
      });

      prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) showPage(order[currentIndex - 1]);
      });

      nextBtn.addEventListener("click", () => {
        if (currentIndex < order.length - 1) showPage(order[currentIndex + 1]);
      });



      /* ===== TAB LATIHAN ===== */
      document.querySelectorAll(".latihan-tab-btn").forEach(btn => {
        btn.addEventListener("click", () => {
          const id = btn.dataset.target;

          document.querySelectorAll(".latihan-tab-btn")
            .forEach(b => b.classList.remove("latihan-tab-active"));
          btn.classList.add("latihan-tab-active");

          document.querySelectorAll(".latihan-tab-page")
            .forEach(p => p.classList.remove("latihan-tab-page-active"));
          document.getElementById(id).classList.add("latihan-tab-page-active");
        });
      });
      showPage(order[0]);



    });

  </script>

 <script>
    /* ==========================================
       SLINKY DEMO (GELOMBANG LONGITUDINAL)
       ========================================== */
    (function () {
      const canvas = document.getElementById("slinkyCanvas");
      if (!canvas) return;

      const ctx = canvas.getContext("2d");
      const W = canvas.width;
      const H = canvas.height;
      
      let handOffset = 0;
      let dragging = false;
      
      let pulses = []; 

      function draw() {
        ctx.clearRect(0, 0, W, H);
        const bg = ctx.createLinearGradient(0, 0, 0, H);
        bg.addColorStop(0, "#eef2ff");
        bg.addColorStop(1, "#f8fafc");
        ctx.fillStyle = bg;
        ctx.fillRect(0, 0, W, H);

        ctx.strokeStyle = "#cbd5e1";
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(20, H / 2);
        ctx.lineTo(W - 20, H / 2);
        ctx.stroke();

        ctx.font = "38px Segoe UI";
        // Tangan disesuaikan tinggi barunya
        ctx.fillText("✋", 30 + handOffset, H / 2 + 14);

        // Majukan posisi gelombang yang ada
        for (let i = pulses.length - 1; i >= 0; i--) {
            pulses[i].pos += pulses[i].speed;
            if (pulses[i].pos > 1.2) { 
                pulses.splice(i, 1);
            }
        }

        const startX = 85; 
        const endX = W - 80;
        const centerY = H / 2;
        const amplitude = 26; // Amplitudo diperbesar karena kanvas lebih tinggi
        const turns = 55; // Lilitan diperbanyak agar rapatan terlihat jelas

        ctx.beginPath();
        for (let i = 0; i <= turns * 20; i++) {
          const t = i / (turns * 20);
          let dx = 0;

          if (dragging || handOffset !== 0) {
              dx += handOffset * Math.exp(-Math.pow(t, 2) / 0.05);
          }

          pulses.forEach(p => {
              const dist = t - p.pos;
              // Rentang penyebaran efek dirapatkan (0.001) agar "rapatan" lebih fokus
              dx += p.amp * Math.exp(-Math.pow(dist, 2) / 0.0015);
          });

          const x = startX + (endX - startX) * t + dx;
          const y = centerY + Math.sin(t * turns * Math.PI * 2) * amplitude;

          if (i === 0) ctx.moveTo(x, y);
          else ctx.lineTo(x, y);
        }

        ctx.strokeStyle = "#475569";
        ctx.lineWidth = 3; // Garis sedikit ditebalkan
        ctx.stroke();

        ctx.fillStyle = "#64748b";
        ctx.font = "16px Segoe UI";
        ctx.fillText(
          "Tarik ✋ ke arah KIRI, lalu lepaskan!",
          30,
          35
        );
      }

      canvas.addEventListener("mousedown", (e) => {
        // Area klik diperlebar karena kanvas lebih besar
        if (e.offsetX < 150) {
          dragging = true;
        }
      });

      canvas.addEventListener("mousemove", (e) => {
        if (!dragging) return;
        // Jarak tarik ke kiri ditambah (-100) agar momentum bisa lebih besar
        handOffset = Math.max(-100, Math.min(20, e.offsetX - 85));
      });

      window.addEventListener("mouseup", () => {
        if (dragging) {
          dragging = false;
          
          if (Math.abs(handOffset) > 15) {
              pulses.push({
                  pos: 0,                   
                  amp: -handOffset * 0.7,   
                  speed: 0.004              // KECEPATAN DIPERLAMBAT (sebelumnya 0.012)
              });
          }
          
          handOffset = 0; 
        }
      });

      function render() {
        draw();
        requestAnimationFrame(render);
      }
      render();
    })();
  </script>

  <script>
    window.addEventListener("beforeunload", function () {
      kirimProgress("konsep_perambatan_bunyi", 8);
    });
  </script>

@endsection