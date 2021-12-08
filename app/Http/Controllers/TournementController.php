<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TournementController extends Controller
{
    private $key;

    public function __construct()
    {
        $this->key = "12345";
    }

    public function index(){
        //$this->fetchMatches();
        return view('tournaments')
            ->with('tournaments',Game::all());
    }

    public function fetchMatches(){
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://fifa.amo.rocks/api/matches.php?key='.$this->key);

        foreach($response->collect() as $game){
            var_dump($game);

            $team1 = new Team();
            $team1->name = $game['team1_name'];
            $team1->creator_id = Auth::id();
            $team1->save();

            $team2 = new Team();
            $team2->name = $game['team2_name'];
            $team2->creator_id = Auth::id();
            $team2->save();

            $newGame = new Game();
            $newGame->team1_id = $team1->id;
            $newGame->team2_id = $team2->id;
            $newGame->team1_score = 0;
            $newGame->team2_score = 0;
            $newGame->field_id = 1;
            $newGame->referee_id = Auth::id();;
            $newGame->save();
        }
    }

    public function fetchResult(){
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://fifa.amo.rocks/api/results.php?key='.$this->key);
        return $response->collect();
    }

    public function fetchGoals($matchId){
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://fifa.amo.rocks/api/goals.php?key='.$this->key.'&match_id='.$matchId);
        return $response->collect();
    }
}
