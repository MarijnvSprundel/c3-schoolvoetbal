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
    return view('dashboard');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('profile', 'profile')->name('profile');

Route::get('/aboutus', function () {
    return view('aboutus');
})->middleware(['auth'])->name('aboutus');

Route::get('/tournaments', function () {
    return view('tournaments');
})->middleware(['auth'])->name('tournaments');

require __DIR__.'/auth.php';
