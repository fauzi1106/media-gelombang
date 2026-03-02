<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\TeacherAnalysisController;
use App\Http\Controllers\GelombangSubmissionController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /* ================= HOME ================= */
    Route::get('/home', [HomeController::class, 'index']);

    /* ================= MATERI ================= */
    Route::controller(MateriController::class)->group(function () {

        // Gelombang
        Route::get('/pengantar_gelombang', 'pengantarGelombang');
        Route::get('/definisi_gelombang', 'definisiGelombang');
        Route::get('/jenis_gelombang', 'jenisGelombang');
        Route::get('/beda_fase_gelombang', 'bedafaseGelombang');
        Route::get('/prinsip_gelombang', 'prinsipGelombang');

        // Bunyi
        Route::get('/pengantar_bunyi', 'pengantarBunyi');
        Route::get('/konsep_perambatan_bunyi', 'konsepPerambatanBunyi');
        Route::get('/sumber_kar_bunyi', 'sumberKarBunyi');
        Route::get('/fenomena_apk_bunyi', 'fenomenaApkBunyi');

        // Cahaya
        Route::get('/pengantar_cahaya', 'pengantarCahaya');
        Route::get('/sifat_cahaya', 'sifatCahaya');
        Route::get('/spektrum_cahaya', 'spektrumCahaya');
        Route::get('/fenomena_apk_cahaya', 'fenomenaApkCahaya');

        // Kuis
        Route::get('/kuis_gelombang', 'kuisGelombang');
        Route::get('/kuis_bunyi', 'kuisBunyi');
        Route::get('/kuis_cahaya', 'kuisCahaya');

        // Evaluasi
        Route::get('/evaluasi', 'evaluasi');

        // Simpan nilai
        Route::post('/simpan-nilai', 'simpanNilai');
    });


    /* ================= GURU ================= */
    Route::controller(GuruController::class)->group(function () {

        Route::get('/guru-nilai', 'nilai');
        Route::get('/export-nilai', 'exportNilai');

        Route::delete('/nilai/{id}', 'deleteAttempt');
        Route::delete('/nilai/{user}/{quiz}', 'deleteAll');

        Route::get('/guru-siswa', 'siswa');
        Route::post('/guru-siswa/store', 'storeSiswa');
        Route::put('/guru-siswa/update/{id}', 'updateSiswa');
        Route::delete('/guru-siswa/delete/{id}', 'deleteSiswa');

        Route::post('/guru/update-kkm', 'updateKKM')
            ->name('guru.updateKKM');
    });


    /* ================= ANALISIS ================= */
    Route::controller(TeacherAnalysisController::class)->group(function () {

        Route::get('/guru/analysis/{quiz_id}', 'index');
        Route::put('/guru/question/{id}', 'updateQuestion')
            ->name('guru.question.update');
    });

    /* ================= PENGUMPULAN GELOMBANG ================= */

    Route::get('/pengumpulan-gelombang', [GelombangSubmissionController::class, 'index']);

    Route::post('/pengumpulan-gelombang', [GelombangSubmissionController::class, 'store']);

    Route::get('/guru/pengumpulan-gelombang',[GelombangSubmissionController::class, 'daftar']);

});