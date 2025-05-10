<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterGuruController;
use App\Http\Controllers\MasterJurusanController;
use App\Http\Controllers\MasterKelasController;
use App\Http\Controllers\MasterMapelController;
use App\Http\Controllers\MasterSiswaController;
use App\Http\Controllers\MasterSoalController;
use App\Http\Controllers\MasterUjianController;
use Illuminate\Support\Facades\Route;

// admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'actionLogin'])->name('login.action');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/updateProfile/{id}', [DashboardController::class, 'updateProfile'])->name('update.profile');

    Route::resource('master_jurusan', MasterJurusanController::class);
    Route::resource('master_kelas', MasterKelasController::class);
    Route::resource('master_siswa', MasterSiswaController::class);
    Route::resource('master_guru', MasterGuruController::class);
    Route::resource('master_mapel', MasterMapelController::class);
    Route::resource('master_ujian', MasterUjianController::class);
    Route::resource('master_soal', MasterSoalController::class);
});



Route::get('/data-ujian', function () {
    return view('data-ujian');
});

Route::get('/tambah-ujian', function () {
    return view('tambah-ujian');
});

Route::get('/edit-ujian', function () {
    return view('edit-ujian');
});

Route::get('/data-soal', function () {
    return view('data-soal');
});

Route::get('/tambah-soal', function () {
    return view('tambah-soal');
});

Route::get('/edit-soal', function () {
    return view('edit-soal');
});

Route::get('/import-soal', function () {
    return view('import-soal');
});

Route::get('/data-sesi', function () {
    return view('data-sesi');
});

Route::get('/tambah-sesi', function () {
    return view('tambah-sesi');
});

Route::get('/edit-sesi', function () {
    return view('edit-sesi');
});

Route::get('/data-peserta', function () {
    return view('data-peserta');
});

Route::get('/tambah-peserta', function () {
    return view('tambah-peserta');
});

Route::get('/edit-peserta', function () {
    return view('edit-peserta');
});

Route::get('/import-peserta', function () {
    return view('import-peserta');
});

Route::get('/cetak-kartu', function () {
    return view('cetak-kartu');
});

Route::get('/peserta-per-sesi', function () {
    return view('peserta-per-sesi');
});

Route::get('/tambah-peserta-per-sesi', function () {
    return view('tambah-peserta-per-sesi');
});

Route::get('/hasil-ujian', function () {
    return view('hasil-ujian');
});

Route::get('/view-hasil-ujian', function () {
    return view('view-hasil-ujian');
});

// peserta
Route::get('/login-peserta', function () {
    return view('users.login-peserta');
})->middleware('guest');

Route::get('/daftar-ujian-peserta', function () {
    return view('users.index-peserta');
});

Route::get('/detail-ujian', function () {
    return view('users.detail-ujian');
});

Route::get('/ujian', function () {
    return view('users.ujian');
});

Route::get('/detail-ujian-selesai', function () {
    return view('users.detail-ujian-selesai');
});

Route::get('/daftar-ujian', function () {
    return view('users.daftar-ujian');
});
