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

Route::get('/', [App\Http\Controllers\HomePageController::class, 'landing'])->name('landing');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], 'bkkPage/{limit?}', [App\Http\Controllers\HomePageController::class, 'bkk'])->name('bkk');
Route::match(['get', 'post'], 'newsPage/{limit?}', [App\Http\Controllers\HomePageController::class, 'news'])->name('news');


Route::middleware(['auth','verified'])->group(function () {
    Route::prefix('bkk')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\BKKController::class, 'index'])->name('bkk.index');
        Route::match(['get', 'post'], 'pencaker/{action?}', [App\Http\Controllers\BKKController::class, 'pencaker'])->name('bkk.pencaker');
        Route::get('lpencaker', [App\Http\Controllers\BKKController::class, 'lpencaker'])->name('bkk.lpencaker');
        Route::get('lowongan', [App\Http\Controllers\BKKController::class, 'lowongan'])->name('bkk.lowongan');
        Route::get('llowongan', [App\Http\Controllers\BKKController::class, 'llowongan'])->name('bkk.llowongan');
        Route::match(['get', 'post'], 'profile/{action?}', [App\Http\Controllers\BKKController::class, 'profile'])->name('bkk.profile');
        Route::match(['get', 'post'], 'bkk/{action?}', [App\Http\Controllers\BKKController::class, 'bkk'])->name('bkk.bkk');
        Route::match(['get', 'post'], 'security/{action?}', [App\Http\Controllers\BKKController::class, 'security'])->name('bkk.security');
        Route::post('print', [App\Http\Controllers\BKKController::class, 'print'])->name('bkk.print');
        Route::post('printIPK1', [App\Http\Controllers\BKKController::class, 'printIPK1'])->name('bkk.printipk1');
        Route::match(['get', 'post'], 'ipk1/{action?}', [App\Http\Controllers\BKKController::class, 'ipk1'])->name('bkk.ipk1');
        Route::get('status/{id}/{stats}', [App\Http\Controllers\BKKController::class, 'status'])->name('bkk.status');
    });
});

Route::any('test/{act?}', [App\Http\Controllers\TestController::class, 'index'])->name('test');
