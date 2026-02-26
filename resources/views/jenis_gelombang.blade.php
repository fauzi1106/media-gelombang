@extends('layouts.siswa')

@section('title', 'Jenis-Jenis Gelombang')

@section('siswa-content')

<div class="materi-gelombang">


  <!-- ====================
       KONTEN UTAMA
       ==================== -->
  <main class="content">

    <h1>Jenis-Jenis Gelombang</h1>

    <div class="box">

      <!-- =========================
           HALAMAN 1 – ARAH GETAR vs RAMBAT
           ========================= -->
      <section id="page-jenis-dasar" class="subpage">
        <p>Gelombang dapat diklasifikasikan berdasarkan dua kriteria utama:</p>

        <h4>a. Berdasarkan Arah Getar dan Arah Rambat</h4>

        <div style="display:flex; flex-wrap:wrap; gap:18px; margin-top:8px;">
          <div style="flex:1 1 280px;">
            <ul>
              <li><b>Gelombang Longitudinal</b>: arah getar sejajar arah rambat. Contoh: gelombang bunyi.</li>
            </ul>
          </div>

          <div class="media-box">
            <video controls>
              <source src="{{ asset('video/longitudinal.mp4') }}" type="video/mp4">
            </video>
          </div>
        </div>

        <div style="display:flex; flex-wrap:wrap; gap:18px; margin-top:14px;">
          <div style="flex:1 1 280px;">
            <ul>
              <li><b>Gelombang Transversal</b>: arah getar tegak lurus arah rambat.</li>
              <li>Contoh: gelombang tali dan cahaya.</li>
            </ul>
          </div>

          <div class="media-box">
            <video controls>
              <source src="{{ asset('video/transversal.mp4') }}" type="video/mp4">
            </video>
          </div>
        </div>
      </section>

      <!-- =========================
           HALAMAN 2 – MEDIUM
           ========================= -->
      <section id="page-medium" class="subpage" style="display:none;">
        <h4>b. Berdasarkan Kebutuhan Medium Perantara</h4>

        <ul>
          <li><b>Gelombang Mekanik</b>: memerlukan medium (air, udara, padat).</li>
          <li><b>Gelombang Elektromagnetik</b>: tidak memerlukan medium.</li>
        </ul>

        <div class="box-diff">
          <h3>Fakta Menarik</h3>
          <p>
            Gelombang gempa terdiri dari gelombang P (longitudinal)
            dan gelombang S (transversal).
          </p>
        </div>
      </section>

      <!-- =========================
           HALAMAN 3 – LATIHAN
           ========================= -->
    <section id="page-latihan" class="subpage" style="display:none;">
    <div class="latihan" id="latihan">
        <h2>Latihan Klasifikasi Gelombang</h2>
        <p>
        Pada halaman ini ada <b>dua tabel latihan</b>:
        </p>
        <ol>
        <li>Klasifikasi berdasarkan <b>arah getar dan arah rambat</b> (Longitudinal / Transversal).</li>
        <li>Klasifikasi berdasarkan <b>kebutuhan medium perantara</b> (Mekanik / Elektromagnetik).</li>
        </ol>
        <p>
        Pilih salah satu jenis gelombang di setiap baris, lalu klik <b>Cek Jawaban</b>.
        </p>

        <!-- =========================
            TABEL 1 – LONGITUDINAL vs TRANSVERSAL
            ========================= -->
        <div class="box-diff" style="margin-top:10px;">
        <h3>Latihan 1 – Berdasarkan Arah Getar dan Arah Rambat</h3>
        <form onsubmit="return false;">
            <table>
            <thead>
                <tr>
                <th style="width:5%;">No</th>
                <th style="width:45%;">Nama Gelombang</th>
                <th style="width:20%;">Longitudinal</th>
                <th style="width:20%;">Transversal</th>
                </tr>
            </thead>
            <tbody id="soalArahBody">

                <tr data-answer="longitudinal">
                <td class="center">1</td>
                <td class="name">Gelombang Bunyi di Udara</td>
                <td class="center"><input type="checkbox" class="chk longitudinal"></td>
                <td class="center"><input type="checkbox" class="chk transversal"></td>
                </tr>

                <tr data-answer="longitudinal">
                <td class="center">2</td>
                <td class="name">Gelombang pada Slinky (didorong–ditarik sepanjang arah pegas)</td>
                <td class="center"><input type="checkbox" class="chk longitudinal"></td>
                <td class="center"><input type="checkbox" class="chk transversal"></td>
                </tr>

                <tr data-answer="transversal">
                <td class="center">3</td>
                <td class="name">Gelombang pada Tali yang Digerakkan ke Atas–Bawah</td>
                <td class="center"><input type="checkbox" class="chk longitudinal"></td>
                <td class="center"><input type="checkbox" class="chk transversal"></td>
                </tr>

                <tr data-answer="transversal">
                <td class="center">4</td>
                <td class="name">Gelombang pada Permukaan Air (riak air)</td>
                <td class="center"><input type="checkbox" class="chk longitudinal"></td>
                <td class="center"><input type="checkbox" class="chk transversal"></td>
                </tr>

                <tr data-answer="transversal">
                <td class="center">5</td>
                <td class="name">Gelombang S pada Gempa Bumi</td>
                <td class="center"><input type="checkbox" class="chk longitudinal"></td>
                <td class="center"><input type="checkbox" class="chk transversal"></td>
                </tr>

            </tbody>
            </table>

            <div class="controls">
            <button class="btn" id="cekArahBtn" type="button">Cek Jawaban</button>
            <button class="btn reset" id="resetArahBtn" type="button">Reset</button>
            <div class="hasil" id="hasilArahArea"></div>
            </div>
        </form>
        </div>

        <!-- =========================
            TABEL 2 – MEKANIK vs ELEKTROMAGNETIK
            ========================= -->
        <div class="box-diff" style="margin-top:16px;">
        <h3>Latihan 2 – Berdasarkan Kebutuhan Medium Perantara</h3>
        <form onsubmit="return false;">
            <table>
            <thead>
                <tr>
                <th style="width:5%;">No</th>
                <th style="width:45%;">Nama Gelombang</th>
                <th style="width:20%;">Mekanik</th>
                <th style="width:20%;">Elektromagnetik</th>
                </tr>
            </thead>
            <tbody id="soalMediumBody">

                <tr data-answer="mekanik">
                <td class="center">1</td>
                <td class="name">Gelombang Bunyi</td>
                <td class="center"><input type="checkbox" class="chk mekanik"></td>
                <td class="center"><input type="checkbox" class="chk elektromagnetik"></td>
                </tr>

                <tr data-answer="mekanik">
                <td class="center">2</td>
                <td class="name">Gelombang Air</td>
                <td class="center"><input type="checkbox" class="chk mekanik"></td>
                <td class="center"><input type="checkbox" class="chk elektromagnetik"></td>
                </tr>

                <tr data-answer="mekanik">
                <td class="center">3</td>
                <td class="name">Gelombang Gempa Bumi</td>
                <td class="center"><input type="checkbox" class="chk mekanik"></td>
                <td class="center"><input type="checkbox" class="chk elektromagnetik"></td>
                </tr>

                <tr data-answer="elektromagnetik">
                <td class="center">4</td>
                <td class="name">Cahaya Tampak</td>
                <td class="center"><input type="checkbox" class="chk mekanik"></td>
                <td class="center"><input type="checkbox" class="chk elektromagnetik"></td>
                </tr>

                <tr data-answer="elektromagnetik">
                <td class="center">5</td>
                <td class="name">Gelombang Radio</td>
                <td class="center"><input type="checkbox" class="chk mekanik"></td>
                <td class="center"><input type="checkbox" class="chk elektromagnetik"></td>
                </tr>

            </tbody>
            </table>

            <div class="controls">
            <button class="btn" id="cekMediumBtn" type="button">Cek Jawaban</button>
            <button class="btn reset" id="resetMediumBtn" type="button">Reset</button>
            <div class="hasil" id="hasilMediumArea"></div>
            </div>
        </form>
        </div>
    </div>
    </section>

    </div>

    <!-- =========================
         NAVIGASI DALAM HALAMAN
         ========================= -->
    <div class="inner-navigation">
      <button id="inner-prev" class="next-btn">Previous</button>

      <button class="next-btn inner-nav-btn" data-target="page-jenis-dasar">1</button>
      <button class="next-btn inner-nav-btn" data-target="page-medium">2</button>
      <button class="next-btn inner-nav-btn" data-target="page-latihan">3</button>

      <button id="inner-next" class="next-btn">Next</button>
    </div>

    <button class="next-btn"onclick="location.href='{{ url('jenis_gelombang') }}'"style="margin-top:10px;">← Materi Sebelumnya</button>
    <button class="next-btn"onclick="location.href='{{ url('beda_fase_gelombang') }}'"style="margin-top:10px;">Materi Selanjutnya →</button>

  </main>
</div>

@endsection

@section('scripts')
{{-- <script src="{{ asset(path: 'js/app.js') }}"></script> --}}
<script>
document.addEventListener("DOMContentLoaded", () => {


  /* ===========================
     NAVIGASI DALAM HALAMAN
     =========================== */
  const pages   = document.querySelectorAll(".subpage");
  const navBtns = document.querySelectorAll(".inner-nav-btn");
  const prevBtn = document.getElementById("inner-prev");
  const nextBtn = document.getElementById("inner-next");

  const order = [
    "page-jenis-dasar",
    "page-medium",
    "page-latihan"
  ];

  let currentIndex = 0;

  function showPage(targetId) {
    pages.forEach(p => {
      p.style.display = (p.id === targetId) ? "block" : "none";
    });

    navBtns.forEach(btn => {
      const active = btn.dataset.target === targetId;
      btn.classList.toggle("active", active);
      btn.style.backgroundColor = active ? "#0f766e" : "";
      btn.style.color = active ? "#ffffff" : "";
    });

    currentIndex = order.indexOf(targetId);
    if (currentIndex < 0) currentIndex = 0;

    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex === order.length - 1;
  }

  navBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      showPage(btn.dataset.target);
    });
  });

  prevBtn.addEventListener("click", () => {
    if (currentIndex > 0) {
      showPage(order[currentIndex - 1]);
    }
  });

  nextBtn.addEventListener("click", () => {
    if (currentIndex < order.length - 1) {
      showPage(order[currentIndex + 1]);
    }
  });

  // halaman awal
  showPage(order[0]);

});

document.addEventListener("DOMContentLoaded", () => {

  function setupClassificationTable(
    tbodyId,
    classA,
    classB,
    cekBtnId,
    resetBtnId,
    hasilId
  ) {
    const rows = document.querySelectorAll(`#${tbodyId} tr`);
    if (!rows.length) return;

    // === BIKIN CHECKBOX SALING EKSKLUSIF ===
    rows.forEach(row => {
      const a = row.querySelector(`.${classA}`);
      const b = row.querySelector(`.${classB}`);

      a.addEventListener("change", () => {
        if (a.checked) b.checked = false;
      });

      b.addEventListener("change", () => {
        if (b.checked) a.checked = false;
      });
    });

    const cekBtn = document.getElementById(cekBtnId);
    const resetBtn = document.getElementById(resetBtnId);
    const hasil = document.getElementById(hasilId);

    // === CEK JAWABAN ===
    cekBtn.addEventListener("click", () => {
      let benar = 0;
      const total = rows.length;

      rows.forEach(row => {
        row.classList.remove("correct", "wrong");

        const jawaban = row.dataset.answer;
        const chkA = row.querySelector(`.${classA}`);
        const chkB = row.querySelector(`.${classB}`);

        let pilihan = null;
        if (chkA.checked) pilihan = classA;
        if (chkB.checked) pilihan = classB;

        if (pilihan === jawaban) {
          row.classList.add("correct");
          benar++;
        } else {
          row.classList.add("wrong");
        }
      });

      hasil.textContent = `Skor: ${benar} / ${total}`;
      hasil.style.color = (benar === total) ? "#15803d" : "#b91c1c";
      hasil.style.fontWeight = "700";
    });

    // === RESET ===
    resetBtn.addEventListener("click", () => {
      rows.forEach(row => {
        row.classList.remove("correct", "wrong");
        row.querySelectorAll("input[type=checkbox]").forEach(c => c.checked = false);
      });
      hasil.textContent = "";
    });
  }

  // ===== TABEL 1 =====
  setupClassificationTable(
    "soalArahBody",
    "longitudinal",
    "transversal",
    "cekArahBtn",
    "resetArahBtn",
    "hasilArahArea"
  );

  // ===== TABEL 2 =====
  setupClassificationTable(
    "soalMediumBody",
    "mekanik",
    "elektromagnetik",
    "cekMediumBtn",
    "resetMediumBtn",
    "hasilMediumArea"
  );

});
</script>

@endsection
