<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Http\Controllers\Fixture;
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

    public function generateGames(){
        $dbTeams = Team::all();
        $teams = array();

        foreach ($dbTeams as $team){
            array_push($teams, $team->id);
        }

        $fixOdd = new Fixture($teams);
        $games = $fixOdd->getSchedule();
        $i = 1;
        foreach($games as $rounds){
            $game = new Game();
            $game->round_num = $i;
            $game->field_id = 1;
            $game->referee_id = 1;
            foreach($rounds as $match){
                $game->team1_id = $match[0];
                $game->team2_id = $match[1];
            }
            $game->save();
            $i++;
        }

    }

}
