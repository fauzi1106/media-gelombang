@extends('layouts.guru')

@section('title', 'Data Nilai Siswa')

@section('guru-content')


    {{-- CONTENT --}}
    <main class="guru-content">

        <h1>Data Nilai Siswa</h1>

        {{-- FILTER KUIS --}}
        <div class="quiz-filter-wrapper">

            <div class="quiz-filter">
                <button class="quiz-btn active" onclick="showQuiz(1, this)">Kuis Gelombang</button>
                <button class="quiz-btn" onclick="showQuiz(2, this)">Kuis Bunyi</button>
                <button class="quiz-btn" onclick="showQuiz(3, this)">Kuis Cahaya</button>
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

                @foreach([1, 2, 3] as $quizId)
                    <tbody class="quiz-group" id="quiz-{{ $quizId }}" style="{{ $quizId != 1 ? 'display:none;' : '' }}">

                        @foreach($nilai as $index => $n)
                            @if($n->quiz_id == $quizId)
                                <tr>
                                    <td>{{ $n->user->name }}</td>
                                    <td>{{ $n->quiz->title }}</td>
                                    <td><b>{{ $n->score }}</b></td>

                                    <td>
                                        @if($n->score >= $kkm)
                                            <span class="status-tuntas">Tuntas</span>
                                        @else
                                            <span class="status-belum">Belum</span>
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

                    <button class="btn-delete-all" onclick="deleteAll({{ $n->user_id }}, {{ $n->quiz_id }})">
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



        </div>

    </main>


@endsection
@section('scripts')
    <script>

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

            details.forEach((d, index) => {

                const durasi = d.duration ?? 0;
                const menit = Math.floor(durasi / 60);
                const detik = durasi % 60;

                tbody.innerHTML += `
                                                <tr>
                                                    <td>${index + 1}</td>
                                                    <td>${d.score}</td>
                                                    <td>${d.benar}</td>
                                                    <td>${d.total_soal}</td>
                                                    <td>${menit}m ${detik}s</td>
                                                    <td>${d.created_at}</td>
                                                    <td>
                                                        <button class="btn-delete" onclick="deleteAttempt(${d.id})">
                                                            X
                                                        </button>
                                                    </td>
                                                </tr>
                                                `;

            });

            document.getElementById('detailModal').style.display = 'flex';
        }

        window.closeDetail = function () {
            document.getElementById('detailModal').style.display = 'none';
        }

        window.deleteAttempt = function (id) {

            if (!confirm("Hapus percobaan ini?")) return;

            fetch(`/nilai/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(() => location.reload());
        }

        window.deleteAll = function (user, quiz) {

            if (!confirm("Hapus semua percobaan siswa ini?")) return;

            fetch(`/nilai/${user}/${quiz}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(() => location.reload());
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

@endsection