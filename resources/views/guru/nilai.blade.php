@extends('layouts.guru')

@section('title', 'Data Nilai Siswa')

@section('guru-content')


    {{-- CONTENT --}}
    <main class="guru-content">

        {{-- @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
        @endif --}}

        <h1>Data Nilai Siswa</h1>

        <div class="kkm-box">

            <form method="POST" action="{{ route('guru.updateKKM') }}" class="kkm-form">
                @csrf

                <select name="quiz_id" id="quizSelect" required>
                    @foreach($quizzes as $quiz)
                        <option value="{{ $quiz->id }}">
                            {{ $quiz->title }}
                        </option>
                    @endforeach
                </select>
                <label style="font-size:13px; font-weight:600;">
                    KKM Saat Ini
                </label>
                <input type="number" id="kkmInput" name="kkm" min="0" max="10" required
                    value="{{ $nilai->first()->quiz->kkm }}">

                <button type="button" class="btn" onclick="confirmKKM()">
                    Update KKM
                </button>

            </form>

        </div>
        {{-- FILTER KUIS --}}
        <div class="quiz-filter-wrapper">

            <div class="quiz-filter">
                <button class="quiz-btn active" onclick="showQuiz(1, this)">Kuis Gelombang</button>
                <button class="quiz-btn" onclick="showQuiz(2, this)">Kuis Bunyi</button>
                <button class="quiz-btn" onclick="showQuiz(3, this)">Kuis Cahaya</button>
                <button class="quiz-btn" onclick="showQuiz(4, this)">Evaluasi</button>
            </div>

            <div class="export-dropdown">
                <button class="btn-export-main" onclick="toggleExportMenu()">
                    Export ▼
                </button>

                <div class="export-menu" id="exportMenu">
                    <a href="/export-nilai">Semua Data</a>
                    <a href="/export-nilai?mode=best">Nilai Tertinggi</a>
                    <hr>
                    <a href="/export-nilai?quiz_id=1">Kuis Gelombang</a>
                    <a href="/export-nilai?quiz_id=2">Kuis Bunyi</a>
                    <a href="/export-nilai?quiz_id=3">Kuis Cahaya</a>
                    <hr>
                    <a href="/export-nilai?quiz_id=1&mode=best">
                        Gelombang (Nilai Tertinggi)
                    </a>
                </div>
            </div>

        </div>


        {{-- TABEL --}}
        <div class="table-wrapper">

            <table>
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kuis</th>
                        <th>Nilai Tertinggi</th>
                        <th>Status</th>
                        <th>Percobaan</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                @foreach([1, 2, 3, 4] as $quizId)
                    <tbody class="quiz-group" id="quiz-{{ $quizId }}" style="{{ $quizId != 1 ? 'display:none;' : '' }}">

                        @foreach($nilai as $index => $n)
                            @if($n->quiz_id == $quizId)
                                <tr>
                                    <td>{{ optional($n->user)->name ?? '-' }}</td>
                                    <td>{{ $n->quiz->title }}</td>
                                    <td><b>{{ $n->score }}</b></td>

                                    <td>
                                        @if($n->score >= $n->quiz->kkm)
                                            <span class="status-tuntas">Tuntas</span>
                                        @else
                                            <span class="status-belum">Belum Tuntas</span>
                                        @endif
                                    </td>

                                    <td>{{ $n->total_attempt }}</td>

                                    <td>
                                        <button class="btn" onclick='openDetail(@json($n->detail))'>
                                            Detail
                                        </button>

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                @endforeach

            </table>

            {{-- MODAL DETAIL --}}
            <div id="detailModal" class="modal-overlay" style="display:none;">
                <div class="modal" style="max-width:700px;">

                    <h3>Detail Percobaan</h3>

                    <button class="btn-delete-all" id="dropAllBtn">
                        Drop Semua
                    </button>

                    <table>
                        <thead>
                            <tr>
                                <th>Percobaan</th>
                                <th>Nilai</th>
                                <th>Benar</th>
                                <th>Total Soal</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detailContent">
                            {{-- diisi JS --}}
                        </tbody>
                    </table>

                    <br>
                    <button class="btn" onclick="closeDetail()">Tutup</button>

                </div>
            </div>

            <!-- UNIVERSAL ALERT MODAL -->
            <div id="actionModal" class="modal-overlay" style="display:none;">
                <div class="modal alert-box" id="actionBox">

                    <div id="actionIcon" class="alert-icon">✔</div>

                    <h3 id="actionTitle">Berhasil</h3>
                    <p id="actionMessage"></p>

                    <div id="actionButtons"></div>

                </div>
            </div>



        </div>

    </main>


@endsection
@section('scripts')
    <script>

        let currentUser = null;
        let currentQuiz = null;

        window.showQuiz = function (id, el) {

            document.querySelectorAll('.quiz-group')
                .forEach(g => g.style.display = 'none');

            document.getElementById('quiz-' + id)
                .style.display = 'table-row-group';

            document.querySelectorAll('.quiz-btn')
                .forEach(btn => btn.classList.remove('active'));

            el.classList.add('active');
        }




    </script>
    <script>
        window.openDetail = function (details) {

            const tbody = document.getElementById('detailContent');
            tbody.innerHTML = '';

            if (!details.length) return;

            // 🔥 SIMPAN USER & QUIZ GLOBAL
            currentUser = details[0].user_id;
            currentQuiz = details[0].quiz_id;

            details.forEach((d, index) => {

                const durasi = d.duration ?? 0;
                const menit = Math.floor(durasi / 60);
                const detik = durasi % 60;

                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${d.score}</td>
                        <td>${d.benar ?? '-'}</td>
                        <td>${d.total_soal ?? '-'}</td>
                        <td>${menit}m ${detik}s</td>
                        <td>${d.created_at}</td>
                        <td>
                            <button class="btn-delete" onclick="deleteAttempt(${d.id})">
                                X
                            </button>
                        </td>
                    </tr>
                `;

                let answerHtml = `<tr><td colspan="7"><div class="answer-detail">`;

                (d.answers || []).forEach((a, i) => {
                    answerHtml += `
                        <div class="answer-box ${a.is_correct ? 'correct' : 'wrong'}">
                            ${i + 1}
                        </div>
                    `;
                });

                answerHtml += `</div></td></tr>`;

                tbody.innerHTML += answerHtml;
            });

            document.getElementById('detailModal').style.display = 'flex';
        }

        document.getElementById('dropAllBtn').onclick = function () {

            if (!currentUser || !currentQuiz) return;

            deleteAll(currentUser, currentQuiz);
        };

        window.closeDetail = function () {
            document.getElementById('detailModal').style.display = 'none';
        }

        window.deleteAttempt = function (id) {

            showModal(
                'warning',
                'Konfirmasi Hapus',
                'Apakah yakin ingin menghapus percobaan ini?',
                `
                            <button class="btn-delete" onclick="processDeleteAttempt(${id})">
                                Ya, Hapus
                            </button>
                            <button class="btn" onclick="closeActionModal()">Batal</button>
                            `
            );
        }

        function processDeleteAttempt(id) {

            fetch(`/nilai/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Accept": "application/json"
                }
            })
                .then(() => {
                    showModal(
                        'danger',
                        'Berhasil Dihapus',
                        'Data percobaan berhasil dihapus.',
                        `<button class="btn" onclick="location.reload()">OK</button>`
                    );
                });
        }

        window.deleteAll = function (user, quiz) {

            showModal(
                'warning',
                'Konfirmasi Hapus Semua',
                'Apakah yakin ingin menghapus SEMUA percobaan siswa ini?',
                `
                            <button class="btn-delete" onclick="processDeleteAll(${user}, ${quiz})">
                                Ya, Hapus Semua
                            </button>
                            <button class="btn" onclick="closeActionModal()">Batal</button>
                            `
            );
        }

        function processDeleteAll(user, quiz) {

            fetch(`/nilai/${user}/${quiz}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(() => {
                    showModal(
                        'danger',
                        'Semua Data Dihapus',
                        'Semua percobaan berhasil dihapus.',
                        `<button class="btn" onclick="location.reload()">OK</button>`
                    );
                });
        }

        window.toggleExportMenu = function () {
            const menu = document.getElementById('exportMenu');
            menu.style.display =
                menu.style.display === 'block' ? 'none' : 'block';
        }

        // klik luar = tutup dropdown
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.export-dropdown')) {
                document.getElementById('exportMenu').style.display = 'none';
            }
        });

    </script>

    <script>
        const kkmData = {
            @foreach($quizzes as $quiz)
                {{ $quiz->id }}: {{ $quiz->kkm }},
            @endforeach
                                };

        document.getElementById('quizSelect').addEventListener('change', function () {
            const selectedQuiz = this.value;

            if (kkmData[selectedQuiz] !== undefined) {
                document.getElementById('kkmInput').value = kkmData[selectedQuiz];
            }
        });

        function showModal(type, title, message, buttonsHtml) {

            const icon = document.getElementById('actionIcon');
            const box = document.getElementById('actionBox');

            if (type === 'success') {
                icon.innerHTML = "✔";
                icon.className = "alert-icon success-icon";
            }

            if (type === 'warning') {
                icon.innerHTML = "⚠";
                icon.className = "alert-icon warning-icon";
            }

            if (type === 'danger') {
                icon.innerHTML = "✖";
                icon.className = "alert-icon danger-icon";
            }

            document.getElementById('actionTitle').innerText = title;
            document.getElementById('actionMessage').innerHTML = message;
            document.getElementById('actionButtons').innerHTML = buttonsHtml;

            document.getElementById('actionModal').style.display = 'flex';
        }

        function closeActionModal() {
            document.getElementById('actionModal').style.display = 'none';
        }

        function confirmKKM() {

            showModal(
                'warning',
                'Konfirmasi Perubahan',
                'Apakah yakin ingin mengubah nilai KKM?',
                `
                            <button class="btn" onclick="submitKKM()">Ya, Update</button>
                            <button class="btn-delete" onclick="closeActionModal()">Batal</button>
                            `
            );
        }

        function submitKKM() {
            document.querySelector('.kkm-form').submit();
        }
    </script>

@endsection