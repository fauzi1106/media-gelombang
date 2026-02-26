@extends('layouts.siswa')

@section('title', 'Pengantar Gelombang Bunyi')

@section('siswa-content')

<div class="materi-gelombang">


  {{-- ====================
       KONTEN
       ==================== --}}
  <main class="content">

    <h1>Pengantar Gelombang Bunyi</h1>

    <div class="box">

      {{-- ===== PAGE 1 ===== --}}
    <section id="page-tp" class="subpage">
    <h3>Tujuan Pembelajaran</h3>
    <p>
        Setelah mempelajari materi gelombang bunyi, peserta didik diharapkan mampu:
    </p>
    <ol>
    <!-- TP ini dituntaskan pada halaman Pengantar Bunyi serta Konsep Dasar & Perambatan Bunyi -->
    <li>Menjelaskan bunyi sebagai gelombang mekanik yang memerlukan medium untuk merambat dengan tepat.</li>

    <!-- TP ini dituntaskan pada halaman Konsep Dasar & Perambatan Bunyi -->
    <li>Menjelaskan konsep perambatan bunyi dalam berbagai medium secara benar.</li>

    <!-- TP ini dituntaskan pada halaman Fenomena & Aplikasi Bunyi -->
    <li>Menganalisis sumber bunyi serta karakteristik bunyi (tinggi–rendah, kuat–lemah, dan warna bunyi) sesuai konsep fisika.</li>

    <!-- TP ini dituntaskan pada halaman Fenomena & Aplikasi Bunyi -->
    <li>Mengaitkan konsep gelombang bunyi dengan fenomena dan penerapannya dalam kehidupan sehari-hari secara tepat.</li>
    </ol>
    </section>

      {{-- ===== PAGE 2 ===== --}}
    <section id="page-apersepsi" class="subpage" style="display:none;">
    <center><h1 style="color:#1e3a8a;">Pengantar</h1></center>

    <p>
        Pada bab sebelumnya, kamu telah mempelajari bahwa <b>gelombang</b> adalah
        getaran yang <b>merambat</b> dan membawa <b>energi</b> tanpa memindahkan
        medium secara permanen.
    </p>

    <p>
        Kamu juga telah mengenal bahwa gelombang dapat dibedakan menjadi
        <b>gelombang mekanik</b> dan <b>gelombang elektromagnetik</b>.
        Gelombang mekanik memerlukan <b>medium</b> untuk dapat merambat.
    </p>

    <p>
        Sekarang, bayangkan jika tidak ada udara di sekitarmu.
        Apakah kamu masih bisa mendengar suara teman yang berbicara?
    </p>

    <p>
        Pertanyaan ini menunjukkan bahwa <b>bunyi merupakan gelombang mekanik</b>
        yang memerlukan medium untuk merambat.
    </p>

    <p>
        Pada bab ini, kamu akan mempelajari:
    </p>

    <ul>
        <li>Bagaimana bunyi dihasilkan.</li>
        <li>Bagaimana bunyi merambat melalui medium.</li>
        <li>Karakteristik bunyi.</li>
        <li>Fenomena serta penerapan gelombang bunyi dalam kehidupan.</li>
    </ul>
    </section>

    </div>

    {{-- ===== NAVIGASI DALAM ===== --}}
    <div class="inner-navigation">
      <button id="inner-prev" class="next-btn">Previous</button>

      <button class="next-btn inner-nav-btn" data-target="page-tp">1</button>
      <button class="next-btn inner-nav-btn" data-target="page-apersepsi">2</button>


      <button id="inner-next" class="next-btn">Next</button>
    </div>


    <button class="next-btn"
      onclick="location.href='{{ url('konsep_perambatan_bunyi') }}'"
      style="margin-top:10px;">
      Materi Selanjutnya →
    </button>

  </main>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {

  const pages = document.querySelectorAll(".subpage");
  const navBtns = document.querySelectorAll(".inner-nav-btn");
  const prevBtn = document.getElementById("inner-prev");
  const nextBtn = document.getElementById("inner-next");

  const order = ["page-tp", "page-apersepsi"];
  let currentIndex = 0;

  function showPage(targetId) {
    pages.forEach(p => {
      p.style.display = (p.id === targetId) ? "block" : "none";
    });

    navBtns.forEach(btn => {
      btn.style.backgroundColor =
        btn.dataset.target === targetId ? "#0f766e" : "";
      btn.style.color =
        btn.dataset.target === targetId ? "#ffffff" : "";
    });

    currentIndex = order.indexOf(targetId);
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex === order.length - 1;
  }

  navBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      showPage(btn.dataset.target);
    });
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
@endsection
