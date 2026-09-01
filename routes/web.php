<?php

use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('siswa.index');
});


/*
|--------------------------------------------------------------------------
| Perusahaan
|--------------------------------------------------------------------------
*/

Route::prefix('perusahaan')->name('perusahaan.')->group(function () {

    Route::get('/', [PerusahaanController::class, 'index'])
        ->name('index');

    Route::get('/create', [PerusahaanController::class, 'create'])
        ->name('create');

    Route::post('/', [PerusahaanController::class, 'store'])
        ->name('store');

    Route::get('/{perusahaan}', [PerusahaanController::class, 'show'])
        ->name('show');

    Route::get('/{perusahaan}/edit', [PerusahaanController::class, 'edit'])
        ->name('edit');

    Route::put('/{perusahaan}', [PerusahaanController::class, 'update'])
        ->name('update');

    Route::delete('/{perusahaan}', [PerusahaanController::class, 'destroy'])
        ->name('destroy');
});


/*
|--------------------------------------------------------------------------
| Siswa
|--------------------------------------------------------------------------
*/

Route::prefix('siswa')->name('siswa.')->group(function () {

    Route::get('/', [SiswaController::class, 'index'])
        ->name('index');

    Route::get('/create', [SiswaController::class, 'create'])
        ->name('create');

    Route::post('/', [SiswaController::class, 'store'])
        ->name('store');

    Route::get('/{siswa}', [SiswaController::class, 'show'])
        ->name('show');

    Route::get('/{siswa}/edit', [SiswaController::class, 'edit'])
        ->name('edit');

    Route::put('/{siswa}', [SiswaController::class, 'update'])
        ->name('update');

    Route::delete('/{siswa}', [SiswaController::class, 'destroy'])
        ->name('destroy');
});


/*
|--------------------------------------------------------------------------
| Kompetensi
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Kompetensi
|--------------------------------------------------------------------------
*/
Route::prefix('kompetensi')->name('kompetensi.')->group(function () {

    Route::get('/', [KompetensiController::class, 'index'])
        ->name('index');

    Route::get('/create', [KompetensiController::class, 'create'])
        ->name('create');

    Route::post('/', [KompetensiController::class, 'store'])
        ->name('store');

    Route::get('/{kompetensi}', [KompetensiController::class, 'show'])
        ->name('show');

    Route::get('/{kompetensi}/edit', [KompetensiController::class, 'edit'])
        ->name('edit');

    Route::put('/{kompetensi}', [KompetensiController::class, 'update'])
        ->name('update');

    Route::delete('/{kompetensi}', [KompetensiController::class, 'destroy'])
        ->name('destroy');

});