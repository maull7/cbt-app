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

Route::get('/data-sesi', function () {
    return view('data-sesi');
});

Route::get('/data-peserta', function () {
    return view('data-peserta');
});

Route::get('/peserta-per-sesi', function () {
    return view('peserta-per-sesi');
});

Route::get('/hasil-ujian', function () {
    return view('hasil-ujian');
});
