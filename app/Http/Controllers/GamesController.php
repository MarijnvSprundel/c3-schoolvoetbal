<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::all();
        // var_dump($games);
        

        return view('dashboard')->with('games', $games);
    }

}
