<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lowongan', function () { return view('lowongan'); })->name('lowongan');
Route::get('bkk', function () { return view('bkk'); })->name('bkk');
Route::get('perusahaan', function () { return view('perusahaan'); })->name('perusahaan');
Route::get('databkk', function ($id) {
    return 'echo';
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('bkk')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\BKKController::class, 'index'])->name('bkk.index');
        Route::match(['get', 'post'], 'pencaker/{action?}', [App\Http\Controllers\BKKController::class, 'pencaker'])->name('bkk.pencaker');
        Route::get('lpencaker', [App\Http\Controllers\BKKController::class, 'lpencaker'])->name('bkk.lpencaker');
        Route::get('lowongan', [App\Http\Controllers\BKKController::class, 'lowongan'])->name('bkk.lowongan');
        Route::get('llowongan', [App\Http\Controllers\BKKController::class, 'llowongan'])->name('bkk.llowongan');
    });
});

Route::any('test/{act?}', [App\Http\Controllers\TestController::class, 'index'])->name('test');
