<?php

use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

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

<<<<<<< HEAD
Route::get('/', [GamesController::class, 'index'])->middleware(['auth'])->name('dashboard');;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
=======
Route::get('/', [TournamentController::class, 'dashboard'])->middleware(['auth']);

Route::get('/dashboard', [TournamentController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
>>>>>>> 3443924e5efa1c7cb206c95999b623c40f500713

Route::view('profile', 'profile')->name('profile');

Route::get('/aboutus', function () {
    return view('aboutus');
})->middleware(['auth'])->name('aboutus');

Route::get('/tournaments', [TournamentController::class, 'index'])->middleware(['auth'])->name('tournaments');

require __DIR__.'/auth.php';
