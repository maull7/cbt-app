<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/data-soal', function () {
    return view('data-soal');
});

Route::get('/tambah-soal', function () {
    return view('tambah-soal');
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

Route::get('/data-peserta', function () {
    return view('data-peserta');
});

Route::get('/tambah-peserta', function () {
    return view('tambah-peserta');
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
