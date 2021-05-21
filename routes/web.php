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

