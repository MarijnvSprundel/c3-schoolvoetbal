<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

use App\Http\Controllers\TeamsController;


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

Route::get('/', [TournamentController::class, 'dashboard'])->name('dashboard');

Route::get('/gen', [TournamentController::class, 'generateGames'])->name('genGames');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::view('/profile', 'profile')->name('profile');

Route::get('/tournaments', [TournamentController::class, 'index'])->middleware(['auth'])->name('tournaments');

Route::resource('/teams', TeamsController::class);

Route::resource('/admin', AdminController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
