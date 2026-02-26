@extends('layouts.siswa')

@section('title', 'Beda Fase Gelombang')

@section('siswa-content')


<div class="materi-gelombang">

<!-- Konten -->
<main class="content">
    
  <h1>Beda Fase Gelombang</h1>

  <div class="box">
    <p>
      Karena gelombang adalah <b>rambatan getaran</b>, setiap titik pada gelombang tidak selalu berada pada posisi getar yang sama. 
      Untuk menyatakan “posisi” suatu titik dalam satu siklus getaran, kita menggunakan konsep <b>fase (ϕ)</b>.
    </p>

    <p>
      Secara umum, fase suatu titik pada gelombang berjalan dapat dituliskan sebagai:
    </p>

    <p style="text-align:center;">
      <span class="rumus">
        ϕ(x,t) = 2π ( t/T − x/λ )
      </span>
    </p>


    <p>
      Di mana:
    </p>
    <ul>
      <li><b>T</b> = periode gelombang (s)</li>
      <li><b>λ</b> = panjang gelombang (m)</li>
      <li><b>x</b> = posisi titik di sepanjang arah rambat (m)</li>
      <li><b>t</b> = waktu (s)</li>
    </ul>

    <p>
      Namun untuk tingkat SMP/SMA, kita sering langsung fokus pada <b>beda fase</b> antara dua titik pada <b>waktu yang sama</b>. 
      Misalkan ada dua titik A dan B yang jaraknya <b>Δx</b> pada satu gelombang, maka:
    </p>

    <p style="text-align:center;">
      <span class="rumus">Δϕ = 2π · (Δx / λ)</span>
    </p>

    <h3>Sefase dan Berlawanan Fase</h3>
    <ul>
      <li>
        <b>Sefase</b>: dua titik dikatakan sefase jika <b>pola getarannya sama</b> (misalnya sama-sama di puncak atau sama-sama di lembah pada saat yang sama).  
        Ini terjadi bila <b>Δϕ = kelipatan 2π</b> (0, 2π, 4π, …) atau <b>Δx = nλ</b> dengan n bilangan bulat.
      </li>
      <li>
        <b>Berlawanan fase</b>: dua titik berlawanan fase jika ketika satu titik di puncak, titik lain berada di lembah (kebalikan).  
        Ini terjadi bila <b>Δϕ = (2n+1)π</b> (π, 3π, 5π, …) atau <b>Δx = (2n+1) λ/2</b>.
      </li>
    </ul>

    <p>
      Memahami beda fase sangat penting ketika nanti kamu mempelajari <b>interferensi</b> gelombang (misalnya pola terang–gelap pada cahaya atau bunyi yang saling menguatkan dan melemahkan).
    </p>
  </div>

  <!-- FITUR INTERAKTIF -->
  <div class="interaktif-box">
    <h2>Interaktif: Beda Fase Dua Titik pada Gelombang</h2>
    <p>
      Amati gelombang di bawah ini. Terdapat dua titik: <b>A</b> (di sebelah kiri) dan <b>B</b> (di sebelah kanan).  
      Geser slider untuk mengubah jarak <b>Δx</b> antara A dan B. Perhatikan bagaimana <b>beda fase (Δϕ)</b> dan kategori fasenya berubah.
    </p>

    <div class="wave-container">
      <canvas id="waveCanvas" width="700" height="260"></canvas>

      <div class="control-panel">
        <label for="sliderDx">
          Jarak antar titik (Δx) dalam satuan panjang gelombang (λ): 
          <span id="infoDx">0,50 λ</span>
        </label>
        <input type="range" id="sliderDx" min="0" max="2" step="0.05" value="0.50">
      </div>

      <div class="info-fase">
        <p>Δϕ = <b><span id="infoPhiDeg">0</span>°</b> &nbsp; (≈ <span id="infoPhiRad">0</span> rad)</p>
        <p>
          <b>Kategori:</b> 
          <span id="infoKategori" class="badge-kategori badge-biasanya">Beda fase biasa</span>
        </p>
        <p style="font-size:13px; color:#4b5563;">
          Tips: coba atur Δx = 0 λ, 0,5 λ, 1 λ, 1,5 λ, dan 2 λ lalu lihat jenis fasenya.
        </p>
      </div>
    </div>
  </div>

  <!-- Navigasi -->
  <button class="next-btn" onclick="location.href='{{ url('jenis_gelombang') }}'">← Materi Sebelumnya</button>
  <button class="next-btn" onclick="location.href='{{ url('prinsip_gelombang') }}'">Materi Selanjutnya →</button>
</div>
@endsection

@section('scripts')
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script>
document.addEventListener("DOMContentLoaded", () => {


  /* =============================
     INTERAKTIF: GEL. SINUS & BEDAF FASE
     ============================= */

  const canvas = document.getElementById("waveCanvas");
  if (!canvas) return; // JIKA HALAMAN TIDAK PUNYA CANVAS → STOP DI SINI

  const ctx = canvas.getContext("2d");

  const W = canvas.width;
  const H = canvas.height;

  const lambdaPx = 180;
  const A = 45;
  const baseY = H / 2;
  const xA = 80;

  const sliderDx = document.getElementById("sliderDx");
  const infoDx = document.getElementById("infoDx");
  const infoPhiDeg = document.getElementById("infoPhiDeg");
  const infoPhiRad = document.getElementById("infoPhiRad");
  const infoKategori = document.getElementById("infoKategori");

  let tAnim = 0;

  function drawBackground() {
    ctx.fillStyle = "#ffffff";
    ctx.fillRect(0, 0, W, H);

    ctx.strokeStyle = "#e5e7eb";
    ctx.beginPath();
    ctx.moveTo(0, baseY);
    ctx.lineTo(W, baseY);
    ctx.stroke();
  }

  function drawWave(dt) {
    tAnim += dt;

    ctx.strokeStyle = "#2563eb";
    ctx.lineWidth = 2;
    ctx.beginPath();

    for (let x = 0; x <= W; x += 2) {
      const phase = 2 * Math.PI * (x / lambdaPx - tAnim * 0.3);
      const y = baseY - A * Math.sin(phase);
      x === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
    }
    ctx.stroke();

    const dxLambda = parseFloat(sliderDx.value);
    const xB = xA + dxLambda * lambdaPx;

    const phaseA = 2 * Math.PI * (xA / lambdaPx - tAnim * 0.3);
    const phaseB = 2 * Math.PI * (xB / lambdaPx - tAnim * 0.3);

    const yA = baseY - A * Math.sin(phaseA);
    const yB = baseY - A * Math.sin(phaseB);

    ctx.setLineDash([4, 4]);
    ctx.strokeStyle = "#9ca3af";
    ctx.beginPath();
    ctx.moveTo(xA, 10); ctx.lineTo(xA, H - 10);
    ctx.moveTo(xB, 10); ctx.lineTo(xB, H - 10);
    ctx.stroke();
    ctx.setLineDash([]);

    ctx.fillStyle = "#16a34a";
    ctx.beginPath(); ctx.arc(xA, yA, 6, 0, Math.PI * 2); ctx.fill();

    ctx.fillStyle = "#dc2626";
    ctx.beginPath(); ctx.arc(xB, yB, 6, 0, Math.PI * 2); ctx.fill();

    ctx.fillStyle = "#111827";
    ctx.font = "14px Segoe UI";
    ctx.fillText("A", xA - 4, yA - 10);
    ctx.fillText("B", xB - 4, yB - 10);
  }

  function updateInfo() {
    const dx = parseFloat(sliderDx.value);
    const deltaPhi = 2 * Math.PI * dx;
    const deg = deltaPhi * 180 / Math.PI;

    infoDx.textContent = dx.toFixed(2).replace(".", ",") + " λ";
    infoPhiDeg.textContent = deg.toFixed(0);
    infoPhiRad.textContent = deltaPhi.toFixed(2);

    const eps = 0.25;
    const norm = deltaPhi % (2 * Math.PI);

    infoKategori.className = "badge-kategori";

    if (Math.abs(norm) < eps || Math.abs(norm - 2 * Math.PI) < eps) {
      infoKategori.textContent = "Sefase (getarannya seirama)";
      infoKategori.classList.add("badge-sefase");
    } else if (Math.abs(norm - Math.PI) < eps) {
      infoKategori.textContent = "Berlawanan fase (puncak–lembah)";
      infoKategori.classList.add("badge-berlawan");
    } else {
      infoKategori.textContent = "Beda fase biasa";
      infoKategori.classList.add("badge-biasanya");
    }
  }

  function loop() {
    drawBackground();
    drawWave(0.016);
    updateInfo();
    requestAnimationFrame(loop);
  }

  sliderDx.addEventListener("input", updateInfo);
  updateInfo();
  requestAnimationFrame(loop);

});
</script>

@endsection