<?php

use Illuminate\Support\Facades\Route;

// admin
Route::get('/login-admin', function () {
    return view('login-admin');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/profile', function () {
    return view('profile');
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
});

Route::get('/peserta', function () {
    return view('users.index-peserta');
});
