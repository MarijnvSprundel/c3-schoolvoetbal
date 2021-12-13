<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $teams = Team::all();

        return view('dashboard')
            ->with('games', $games)
            ->with('teams', $teams);
    }

}
