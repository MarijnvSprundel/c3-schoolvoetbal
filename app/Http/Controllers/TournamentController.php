<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TournamentController extends Controller
{
    public function index(){
        //$this->fetchMatches();
        return view('tournaments')
            ->with('tournaments', Game::all());
    }

    public function dashboard(){
        //$this->fetchMatches();
        return view('dashboard')
            ->with('games', Game::all())
            ->with('teams', Team::all());
    }
}
