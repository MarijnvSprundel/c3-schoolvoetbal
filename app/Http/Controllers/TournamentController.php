<?php

namespace App\Http\Controllers;

use App\Models\field;
use App\Models\Game;
use App\Models\Team;
use App\Http\Controllers\Fixture;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TournamentController extends Controller
{
    public function index(){
        return view('tournaments')
            ->with('tournaments', Game::all());
    }

    public function dashboard(){
        return view('dashboard')
            ->with('games', Game::all())
            ->with('teams', Team::all());
    }

    public function generateGames(){
        $dbGames = Game::all();
        foreach ($dbGames as $game){
            $game->delete();
        }

        $dbUsers = User::all();
        $users = array();
        foreach ($dbUsers as $user){
            array_push($users, $user->id);
        }

        $dbFields = Field::all();
        $fields = array();
        foreach ($dbFields as $field){
            array_push($fields, $field->id);
        }

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
            $game->field_id = $fields[array_rand($fields, 1)];
            $game->referee_id = $users[array_rand($users, 1)];
            foreach($rounds as $match){
                $game->team1_id = $match[0];
                $game->team2_id = $match[1];
            }
            $game->save();
            $i++;
        }

        return redirect(route('tournaments'));

    }

}
