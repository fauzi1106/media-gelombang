@extends('layouts.siswa')

@section('title', 'Fenomena & Aplikasi Cahaya')

@section('siswa-content')

<div class="materi-gelombang">

  {{-- ==================== KONTEN ==================== --}}
  <main class="content">

    <h1>Fenomena & Aplikasi Cahaya</h1>

    <div class="box">

      {{-- ===== PAGE 1 ===== --}}
      <section id="page-fenomena" class="subpage">
        <h3>Fenomena Cahaya</h3>

        <p>
          Cahaya tidak hanya memungkinkan manusia melihat benda,
          tetapi juga menimbulkan berbagai fenomena alam yang dapat diamati
          dalam kehidupan sehari-hari.
        </p>

        <p>
          Fenomena cahaya terjadi karena cahaya berinteraksi dengan medium
          seperti udara, air, kaca, atau permukaan benda.
        </p>

        <div class="box-diff">
          Fenomena cahaya terjadi karena cahaya dapat
          <b>dipantulkan, dibiaskan, diserap, dan diuraikan</b>.
        </div>

        <p>
          Ketika cahaya mengenai suatu benda, sebagian cahaya akan dipantulkan,
          sebagian dapat menembus benda (dibiaskan), dan sebagian lagi diserap.
        </p>

        <p>
          Bayangan terbentuk karena cahaya merambat lurus dan terhalang benda.
          Pelangi terbentuk karena cahaya Matahari dibiaskan, dipantulkan,
          lalu diuraikan oleh butiran air hujan.
        </p>

        <!-- GAMBAR DI TENGAH BAWAH -->
        <div class="example-row" style="display:flex; flex-direction:column; align-items:center; margin-top:24px;">
          <div class="example-image" style="text-align:center;">
            <img src="{{ asset('images/fenomena_cahaya.png') }}" alt="Fenomena cahaya" style="max-width:540px;">
            <p class="image-caption">Contoh fenomena cahaya dalam kehidupan sehari-hari.</p>
          </div>
        </div>
      </section>



      {{-- ===== PAGE 2 ===== --}}
      <section id="page-aplikasi" class="subpage" style="display:none;">
        <h3>Aplikasi Cahaya</h3>

        <p>
          Cahaya dimanfaatkan dalam berbagai bidang teknologi modern,
          mulai dari komunikasi hingga kesehatan.
        </p>

        <div class="box-diff">
          Cahaya digunakan dalam bidang <b>komunikasi, medis, industri, dan energi</b>.
        </div>

        <p>
          Dalam bidang komunikasi, cahaya digunakan dalam serat optik
          untuk mengirimkan data dengan kecepatan tinggi.
        </p>

        <p>
          Dalam bidang kesehatan, cahaya dimanfaatkan melalui
          sinar laser dan sinar-X untuk membantu diagnosis dan operasi.
        </p>

        <div class="example-row">
          <div class="example-image">
            <img src="{{ asset('images/aplikasi_cahaya.png') }}" alt="Aplikasi cahaya">
            <p class="image-caption">Pemanfaatan cahaya dalam teknologi.</p>
          </div>

          <div class="example-text">
            <p><b>Contoh aplikasi cahaya:</b></p>
            <ul>
              <li>Serat optik untuk internet</li>
              <li>Laser untuk operasi medis</li>
              <li>Lampu LED hemat energi</li>
              <li>Kamera dan sensor optik</li>
            </ul>
          </div>
        </div>
      </section>


      {{-- ===== PAGE 3 ===== --}}
<section id="page-keterkaitan" class="subpage" style="display:none;">
  <h3>Keterkaitan Cahaya dengan Spektrum Elektromagnetik</h3>

  <p>
    Cahaya tampak hanyalah sebagian kecil dari spektrum gelombang elektromagnetik.
  </p>

  <div class="box-diff">
    Semakin kecil panjang gelombang, semakin besar energi gelombang.
  </div>

  <p>
    Gelombang elektromagnetik mencakup berbagai jenis gelombang
    yang digunakan dalam teknologi modern.
  </p>

  <p>
    Setiap jenis gelombang memiliki karakteristik dan pemanfaatan yang berbeda.
  </p>

  <div class="example-row">
    <div class="example-text">
      <p><b>Contoh spektrum dan manfaat:</b></p>
      <ul>
        <li>Radio → komunikasi</li>
        <li>Inframerah → kamera termal</li>
        <li>Cahaya tampak → penglihatan</li>
        <li>Sinar-X → medis</li>
      </ul>
    </div>

    <div class="example-image">
      <img src="{{ asset('images/spektrum_elektromagnetik.png') }}" alt="Spektrum EM">
      <p class="image-caption">Posisi cahaya tampak dalam spektrum elektromagnetik.</p>
    </div>
  </div>
</section>


    </div>

    {{-- ===== NAVIGASI ===== --}}
    <div class="inner-navigation">
      <button id="inner-prev" class="next-btn">Previous</button>
      <button class="next-btn inner-nav-btn" data-target="page-fenomena">1</button>
      <button class="next-btn inner-nav-btn" data-target="page-aplikasi">2</button>
      <button class="next-btn inner-nav-btn" data-target="page-keterkaitan">3</button>
      <button id="inner-next" class="next-btn">Next</button>
    </div>

    <button class="next-btn" onclick="location.href='{{ url('spektrum_cahaya') }}'">← Materi Sebelumnya</button>
    <button class="next-btn" onclick="location.href='{{ url('kuis_cahaya') }}'">Kuis Cahaya →</button>

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

  const order = ["page-fenomena","page-aplikasi","page-keterkaitan"];
  let index = 0;

  function showPage(id){
    pages.forEach(p=>p.style.display=(p.id===id)?"block":"none");
    navBtns.forEach(b=>{
      const active=b.dataset.target===id;
      b.style.backgroundColor=active?"#0f766e":"";
      b.style.color=active?"#ffffff":"";
    });
    index=order.indexOf(id);
    prevBtn.disabled=index===0;
    nextBtn.disabled=index===order.length-1;
  }

  navBtns.forEach(b=>b.onclick=()=>showPage(b.dataset.target));
  prevBtn.onclick=()=>index>0&&showPage(order[index-1]);
  nextBtn.onclick=()=>index<order.length-1&&showPage(order[index+1]);

  showPage(order[0]);
});
</script>
@endsection
