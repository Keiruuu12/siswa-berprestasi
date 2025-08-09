<?php

use App\Http\Controllers\BobotKriteriaSiswaController;
use App\Http\Controllers\KriteriaSiswaController;
use App\Http\Controllers\PeringkatSawController;
use App\Http\Controllers\PeringkatAhpController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Models\KriteriaSiswa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('siswa');
})->middleware('auth');

Route::fallback(function () {
    return redirect('/siswa');
});


Route::resource('siswa', SiswaController::class)->except(['show'])->middleware('auth');

Route::resource('kriteria-siswa', KriteriaSiswaController::class)->except(['show'])->middleware('auth');



Route::resource('bobot-siswa', BobotKriteriaSiswaController::class)->except(['show', 'destroy'])->middleware('auth');

Route::resource('peringkat-saw', PeringkatSawController::class)->only(['index', 'create'])->middleware('auth');
Route::resource('peringkat-ahp', PeringkatAhpController::class)->only(['index', 'create'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('users', UserController::class)->except(['update', 'edit', 'show'])->middleware('isAdmin');


Route::post('user-update-role', [UserController::class, 'updateRole'])->name('users.update-role');