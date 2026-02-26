<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\TeacherAnalysisController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('landing');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


// ===============================
// SEMUA HALAMAN WAJIB LOGIN
// ===============================
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index']);

    // ================= MATERI =================
    Route::get('/pengantar_gelombang', [MateriController::class, 'pengantarGelombang']);
    Route::get('/definisi_gelombang', [MateriController::class, 'definisiGelombang']);
    Route::get('/jenis_gelombang', [MateriController::class, 'jenisGelombang']);
    Route::get('/beda_fase_gelombang', [MateriController::class, 'bedafaseGelombang']);
    Route::get('/prinsip_gelombang', [MateriController::class, 'prinsipGelombang']);

    Route::get('/pengantar_bunyi', [MateriController::class, 'pengantarBunyi']);
    Route::get('/konsep_perambatan_bunyi', [MateriController::class, 'konsepPerambatanBunyi']);
    Route::get('/sumber_kar_bunyi', [MateriController::class, 'sumberKarBunyi']);
    Route::get('/fenomena_apk_bunyi', [MateriController::class, 'fenomenaApkBunyi']);

    Route::get('/pengantar_cahaya', [MateriController::class, 'pengantarCahaya']);
    Route::get('/sifat_cahaya', [MateriController::class, 'sifatCahaya']);
    Route::get('/spektrum_cahaya', [MateriController::class, 'spektrumCahaya']);
    Route::get('/fenomena_apk_cahaya', [MateriController::class, 'fenomenaApkCahaya']);

    Route::get('/kuis_gelombang', [MateriController::class, 'kuisGelombang']);
    Route::get('/kuis_bunyi', [MateriController::class, 'kuisBunyi']);
    Route::get('/kuis_cahaya', [MateriController::class, 'kuisCahaya']);

    Route::post('/simpan-nilai', [MateriController::class, 'simpanNilai']);

    // ================= GURU =================
    Route::get('/guru-nilai', [GuruController::class, 'nilai']);
    Route::delete('/nilai/{id}', [GuruController::class, 'deleteAttempt']);
    Route::delete('/nilai/{user}/{quiz}', [GuruController::class, 'deleteAll']);
    Route::get('/export-nilai', [GuruController::class, 'exportNilai']);

    Route::get('/guru-siswa', [GuruController::class, 'siswa']);
    Route::post('/guru-siswa/store', [GuruController::class, 'storeSiswa']);
    Route::put('/guru-siswa/update/{id}', [GuruController::class, 'updateSiswa']);
    Route::delete('/guru-siswa/delete/{id}', [GuruController::class, 'deleteSiswa']);

    // ================= ANALISIS =================
    Route::get('/guru/analysis/{quiz_id}', [TeacherAnalysisController::class, 'index']);

    // ================= QUESTIONS =================
    Route::put('/guru/question/{id}',[TeacherAnalysisController::class, 'updateQuestion'])->name('guru.question.update');

});