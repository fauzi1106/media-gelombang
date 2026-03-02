@extends('layouts.app')

@section('title', 'Evaluasi Akhir Materi')

@section('content')

    <div class="quiz-page">

        <main class="quiz-main">

            <h1>Evaluasi Akhir Materi Gelombang</h1>

            {{-- POPUP ATURAN --}}
            <div class="modal-overlay" id="startModal" style="display:flex;">
                <div class="modal">
                    <h3>Aturan & Petunjuk Evaluasi</h3>

                    <ul style="text-align:left; margin-top:10px;">
                        <li>Jumlah soal: <b>{{ count($questions) }}</b></li>
                        <li>Waktu pengerjaan: <b>{{ ceil(count($questions) / 2) }} menit</b></li>
                        <li>Pilih jawaban yang paling tepat.</li>
                        <li>Semua soal wajib dijawab.</li>
                        <li>Batas kelulusan (KKM): <b>{{ $kkm }}</b></li>
                    </ul>

                    <button class="btn-finish" id="startQuizBtn">Mulai Evaluasi</button>
                </div>
            </div>

            {{-- WRAPPER EVALUASI --}}
            <div class="quiz-wrapper" id="quizWrapper" style="display:none;">

                <div class="quiz-header">
                    <h2>Evaluasi Akhir</h2>
                    <div class="timer">⏳ Waktu: <span id="timer"></span></div>
                </div>

                <div class="nav-row">
                    <div class="nav-soal" id="navSoal"></div>

                    <div class="legend-vertical">
                        <div><span class="legend-dot legend-notyet"></span> Belum dijawab</div>
                        <div><span class="legend-dot legend-current"></span> Sedang aktif</div>
                        <div><span class="legend-dot legend-answered"></span> Sudah dijawab</div>
                    </div>
                </div>

                <div class="question-box">
                    <div class="question-text" id="questionText"></div>
                    <ul class="options-list" id="optionsList"></ul>
                </div>

                <div class="quiz-actions">
                    <button class="btn-nav" id="prevBtn">← Sebelumnya</button>
                    <button class="btn-nav" id="nextBtn">Berikutnya →</button>
                    <button class="btn-finish" id="finishBtn">Selesaikan</button>
                </div>

            </div>

            {{-- MODAL HASIL --}}
            <div class="modal-overlay" id="resultModal">
                <div class="modal">
                    <div id="resultIcon" style="font-size:40px;">🎉</div>
                    <h3 id="resultTitle"></h3>
                    <p id="resultMessage"></p>
                    <button class="btn-finish" id="resultOkBtn">OK</button>
                </div>
            </div>

        </main>
    </div>

@endsection


@section('scripts')
    <script>

        const questions = @json($questions);
        const QUIZ_ID = {{ $quiz_id }};
        const KKM = {{ $kkm }};

        let currentIndex = 0;
        let userAnswers = Array(questions.length).fill(null);
        let startTime = null;

        /* =========================
           TIMER DINAMIS
        ========================= */
        let timeLeft = {{ count($questions) * 30 }};
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

        /* =========================
           NAVIGASI SOAL
        ========================= */
        const navSoal = document.getElementById("navSoal");
        const qText = document.getElementById("questionText");
        const optionsList = document.getElementById("optionsList");

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

        function loadQuestion() {
            const q = questions[currentIndex];
            qText.textContent = q.q;
            optionsList.innerHTML = "";

            q.options.forEach((opt, idx) => {
                const li = document.createElement("li");
                li.innerHTML = `
                <label>
                    <input type="radio" name="soal" value="${idx}"
                        ${userAnswers[currentIndex] === idx ? "checked" : ""}>
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
           NEXT / PREV
        ========================= */
        document.getElementById("nextBtn").onclick = () => {
            if (currentIndex < questions.length - 1) {
                currentIndex++;
                loadQuestion();
            }
        };

        document.getElementById("prevBtn").onclick = () => {
            if (currentIndex > 0) {
                currentIndex--;
                loadQuestion();
            }
        };

        /* =========================
           START
        ========================= */
        const startModal = document.getElementById("startModal");
        const quizWrapper = document.getElementById("quizWrapper");

        document.getElementById("startQuizBtn").onclick = () => {
            startModal.style.display = "none";
            quizWrapper.style.display = "block";

            startTime = Date.now();
            startTimer();
            loadQuestion();
        };

        /* =========================
           FINISH
        ========================= */
        function finishQuiz() {

            if (userAnswers.includes(null)) {
                alert("Masih ada soal yang belum dijawab.");
                return;
            }

            clearInterval(timerInterval);

            const endTime = Date.now();
            const duration = Math.floor((endTime - startTime) / 1000);

            let benar = 0;
            questions.forEach((q, i) => {
                if (userAnswers[i] === q.answer) benar++;
            });

            const nilaiPersen = Math.round((benar / questions.length) * 100);
            const tuntas = nilaiPersen >= KKM;

            const modal = document.getElementById("resultModal");
            const resultIcon = document.getElementById("resultIcon");
            const resultTitle = document.getElementById("resultTitle");
            const resultMessage = document.getElementById("resultMessage");

            if (tuntas) {
                resultIcon.textContent = "🎉";
                resultTitle.textContent = "Tuntas!";
                resultMessage.innerHTML = `Nilai kamu: <b>${nilaiPersen}</b>`;
            } else {
                resultIcon.textContent = "📚";
                resultTitle.textContent = "Belum Tuntas";
                resultMessage.innerHTML = `
                Nilai kamu: <b>${nilaiPersen}</b><br>
                KKM: ${KKM}
            `;
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
                    score: benar, // backend yang hitung persen
                    total_soal: questions.length,
                    benar: benar,
                    duration: duration
                })
            });
        }

        document.getElementById("finishBtn").onclick = finishQuiz;

    </script>
@endsection