@extends('layouts.app')

@section('title', 'Kuis Materi Dasar Gelombang')

@section('content')

  <div class="quiz-page"> {{-- wrapper TANPA sidebar --}}

    <main class="quiz-main">

      <h1>Kuis Pemahaman Materi Dasar Gelombang</h1>

      {{-- POPUP ATURAN --}}
      <div class="modal-overlay" id="startModal" style="display:flex;">
        <div class="modal">
          <h3>Aturan & Petunjuk Kuis</h3>
          <ul style="text-align:left; margin-top:10px;">
            <li>Jumlah soal: <b>10</b></li>
            <li>Waktu pengerjaan: <b>10 menit</b></li>
            <li>Pilih jawaban yang paling tepat.</li>
            <li>Soal dapat dipindah lewat tombol angka.</li>
            <li>
              Warna navigasi:
              <ul>
                <li>Abu-abu: belum dijawab</li>
                <li>Biru: sedang aktif</li>
                <li>Hijau: sudah dijawab</li>
              </ul>
            </li>
            <li>Klik <b>Selesaikan Kuis</b> jika sudah selesai.</li>
          </ul>

          <button class="btn-finish" id="startQuizBtn">Mulai Kuis</button>
        </div>
      </div>

      {{-- WRAPPER KUIS --}}
      <div class="quiz-wrapper" id="quizWrapper" style="display:none;">

        <div class="quiz-header">
          <h2>Kuis 1: Gelombang</h2>
          <div class="timer">⏳ Waktu: <span id="timer">10:00</span></div>
        </div>

        <div class="nav-row">
          <div class="nav-soal" id="navSoal"></div>

          <div class="legend-vertical">
            <div class="legend-item">
              <span class="legend-dot legend-notyet"></span> Belum dijawab
            </div>
            <div class="legend-item">
              <span class="legend-dot legend-current"></span> Sedang aktif
            </div>
            <div class="legend-item">
              <span class="legend-dot legend-answered"></span> Sudah dijawab
            </div>
          </div>
        </div>



        <div class="question-box">
          <div class="question-text" id="questionText"></div>
          <ul class="options-list" id="optionsList"></ul>
        </div>

        <div class="quiz-actions">
          <button class="btn-nav" id="prevBtn">← Sebelumnya</button>
          <button class="btn-nav" id="nextBtn">Berikutnya →</button>
          <button class="btn-finish" id="finishBtn">Selesaikan Kuis</button>
        </div>

      </div>

      {{-- MODAL HASIL --}}
      <div class="modal-overlay" id="resultModal">
        <div class="modal">
          <div class="modal-icon" id="resultIcon">🎉</div>
          <h3 id="resultTitle">Hasil</h3>
          <p id="resultMessage"></p>
          <button class="btn-finish" id="resultOkBtn">OK</button>
        </div>
      </div>

    </main>
  </div>

@endsection
@section('scripts')
  <script>
    /* =========================
       KONFIGURASI HALAMAN
    ========================= */
    const NEXT_PAGE = "{{ url('pengantar_bunyi') }}";
    const REVIEW_PAGE = "{{ url('definisi_gelombang') }}";

    /* =========================
      MEMANGGIL SOAL (10)
    ========================= */

    const questions = @json($questions);

    let startTime = null;

    /* =========================
       STATE
    ========================= */
    let currentIndex = 0;
    let userAnswers = Array(questions.length).fill(null);

    /* =========================
       ELEMEN
    ========================= */
    const navSoal = document.getElementById("navSoal");
    const qText = document.getElementById("questionText");
    const optionsList = document.getElementById("optionsList");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    /* =========================
       RENDER NAV
    ========================= */
    function renderNav() {
      navSoal.innerHTML = "";
      questions.forEach((_, i) => {
        const btn = document.createElement("button");
        btn.classList.add("nav-btn");

        if (userAnswers[i] !== null) btn.classList.add("nav-answered");
        else btn.classList.add("nav-notyet");

        if (i === currentIndex) {
          btn.classList.remove("nav-notyet", "nav-answered");
          btn.classList.add("nav-current");
        }

        btn.textContent = i + 1;
        btn.onclick = () => { currentIndex = i; loadQuestion(); };
        navSoal.appendChild(btn);
      });
    }

    /* =========================
       LOAD SOAL
    ========================= */
    function loadQuestion() {
      const q = questions[currentIndex];
      qText.textContent = q.q;
      optionsList.innerHTML = "";

      q.options.forEach((opt, idx) => {
        const li = document.createElement("li");
        li.innerHTML = `
                        <label>
                          <input type="radio" name="soal" value="${idx}" ${userAnswers[currentIndex] === idx ? "checked" : ""}>
                          <span>${opt}</span>
                        </label>`;
        optionsList.appendChild(li);
      });
      renderNav();
    }

    /* =========================
       SIMPAN JAWABAN
    ========================= */
    document.addEventListener("change", e => {
      if (e.target.name === "soal") {
        userAnswers[currentIndex] = Number(e.target.value);
        renderNav();
      }
    });

    /* =========================
       NAV NEXT / PREV
    ========================= */
    nextBtn.onclick = () => { if (currentIndex < questions.length - 1) { currentIndex++; loadQuestion(); } };
    prevBtn.onclick = () => { if (currentIndex > 0) { currentIndex--; loadQuestion(); } };

    /* =========================
       TIMER
    ========================= */
    let timeLeft = 600;
    const timerText = document.getElementById("timer");

    let timerInterval;

    function startTimer() {
      timerInterval = setInterval(() => {
        const m = Math.floor(timeLeft / 60);
        const s = timeLeft % 60;
        timerText.textContent = `${m}:${s.toString().padStart(2, "0")}`;

        if (timeLeft <= 0) {
          clearInterval(timerInterval);
          finishQuiz();
        }
        timeLeft--;
      }, 1000);
    }

  </script>
  <script>
    const QUIZ_ID = {{ $quiz_id }};
  </script>

  <script>
    /* =========================
       POPUP ATURAN (AWAL)
    ========================= */
    const startModal = document.getElementById("startModal");
    const startBtn = document.getElementById("startQuizBtn");
    const quizWrapper = document.getElementById("quizWrapper");

    window.onload = () => {
      startModal.style.display = "flex";
      quizWrapper.style.display = "none";
    };

    startBtn.onclick = () => {
      startModal.style.display = "none";
      quizWrapper.style.display = "block";

      startTime = Date.now(); // mulai hitung waktu
      startTimer();           // mulai timer

      loadQuestion();
    };



    /* =========================
       POPUP HASIL
    ========================= */
    const modal = document.getElementById("resultModal");
    const resultIcon = document.getElementById("resultIcon");
    const resultTitle = document.getElementById("resultTitle");
    const resultMessage = document.getElementById("resultMessage");
    const resultOkBtn = document.getElementById("resultOkBtn");

    function finishQuiz() {

      if (!startTime) startTime = Date.now();

      const endTime = Date.now();
      const duration = Math.floor((endTime - startTime) / 1000);

      if (userAnswers.includes(null)) {
        alert("Masih ada soal yang belum dijawab.");
        return;
      }

      let score = 0;
      questions.forEach((q, i) => {
        if (userAnswers[i] === q.answer) score++;
      });

      const tuntas = score >= 7; // batas kelulusan

      if (tuntas) {
        resultIcon.textContent = "🎉";
        resultTitle.textContent = "Tuntas!";
        resultMessage.innerHTML = `Nilai kamu: <b>${score}/10</b><br>Kamu boleh lanjut.`;
        resultOkBtn.textContent = "Lanjut Materi";
        resultOkBtn.onclick = () => window.location.href = NEXT_PAGE;
      } else {
        resultIcon.textContent = "📚";
        resultTitle.textContent = "Belum Tuntas";
        resultMessage.innerHTML = `Nilai kamu: <b>${score}/10</b><br>Pelajari ulang materi.`;
        resultOkBtn.textContent = "Kembali Belajar";
        resultOkBtn.onclick = () => window.location.href = REVIEW_PAGE;
      }

      modal.style.display = "flex";

      fetch("/simpan-nilai", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
          quiz_id: QUIZ_ID,
          answers: userAnswers,
          questions: questions,
          score: score,
          total_soal: questions.length,
          benar: score,
          duration: duration
        })


      })
        .then(response => response.json())
        .then(data => {
          console.log("Nilai tersimpan");
        })
        .catch(error => {
          console.error("Gagal simpan nilai:", error);
        });

    }


    /* =========================
       TOMBOL FINISH
    ========================= */
    document.getElementById("finishBtn").onclick = finishQuiz;
  </script>



@endsection