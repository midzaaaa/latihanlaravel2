<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PerusahaanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('siswa', SiswaController::class);
Route::resource('perusahaan', PerusahaanController::class);