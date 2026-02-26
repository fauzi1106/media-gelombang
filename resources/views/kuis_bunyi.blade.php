@extends('layouts.app')

@section('title', 'Kuis Materi Bunyi')

@section('content')

  <div class="quiz-page">

    <main class="quiz-main">

      <h1>Kuis Pemahaman Materi Bunyi</h1>

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
          <h2>Kuis 2: Bunyi</h2>
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
    let startTime = null;

    const QUIZ_ID = {{ $quiz_id }};
  </script>

  <script>
    const NEXT_PAGE = "{{ url('pengantar_cahaya') }}";
    const REVIEW_PAGE = "{{ url('konsep_perambatan_bunyi') }}";

    // konek database soal
    const questions = @json($questions);


    let currentIndex = 0;
    let userAnswers = Array(questions.length).fill(null);

    const navSoal = document.getElementById("navSoal");
    const qText = document.getElementById("questionText");
    const optionsList = document.getElementById("optionsList");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    function renderNav() {
      navSoal.innerHTML = "";
      questions.forEach((_, i) => {
        const btn = document.createElement("button");
        btn.className = "nav-btn " + (userAnswers[i] !== null ? "nav-answered" : "nav-notyet");
        if (i === currentIndex) btn.className = "nav-btn nav-current";
        btn.textContent = i + 1;
        btn.onclick = () => { currentIndex = i; loadQuestion(); };
        navSoal.appendChild(btn);
      });
    }

    function loadQuestion() {
      const q = questions[currentIndex];
      qText.textContent = q.q;
      optionsList.innerHTML = "";
      q.options.forEach((opt, i) => {
        const li = document.createElement("li");
        li.innerHTML = `<label><input type="radio" name="soal" value="${i}" ${userAnswers[currentIndex] === i ? "checked" : ""}> ${opt}</label>`;
        optionsList.appendChild(li);
      });
      renderNav();
    }

    document.addEventListener("change", e => {
      if (e.target.name === "soal") {
        userAnswers[currentIndex] = Number(e.target.value);
        renderNav();
      }
    });

    nextBtn.onclick = () => { if (currentIndex < questions.length - 1) { currentIndex++; loadQuestion(); } };
    prevBtn.onclick = () => { if (currentIndex > 0) { currentIndex--; loadQuestion(); } };

    let timeLeft = 600;
    const timerText = document.getElementById("timer");
    const timerInterval = setInterval(() => {
      const m = Math.floor(timeLeft / 60);
      const s = timeLeft % 60;
      timerText.textContent = `${m}:${s.toString().padStart(2, "0")}`;
      if (timeLeft <= 0) { clearInterval(timerInterval); finishQuiz(); }
      timeLeft--;
    }, 1000);

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

      startTime = Date.now();
      loadQuestion();
    };


    const modal = document.getElementById("resultModal");
    const resultIcon = document.getElementById("resultIcon");
    const resultTitle = document.getElementById("resultTitle");
    const resultMessage = document.getElementById("resultMessage");
    const resultOkBtn = document.getElementById("resultOkBtn");

    function finishQuiz() {
      
      const endTime = Date.now();
      const duration = Math.floor((endTime - startTime) / 1000);

      if (userAnswers.includes(null)) {
        alert("Masih ada soal yang belum dijawab.");
        return;
      }
      let score = 0;
      questions.forEach((q, i) => { if (userAnswers[i] === q.answer) score++; });
      const tuntas = score >= 7;

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
          console.log("Nilai berhasil disimpan");
        })
        .catch(error => {
          console.error("Gagal simpan nilai:", error);
        });

    }

    document.getElementById("finishBtn").onclick = finishQuiz;
  </script>
@endsection