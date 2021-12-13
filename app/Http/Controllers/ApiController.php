<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function users(Request $request){
        $users = User::all();
        return json_encode($users);
    }

    public function teams(Request $request){
        $teams = Team::all();
        return json_encode($teams);
    }

    public function matches(Request $request){
        $games = Game::all();
        return json_encode($games);
    }

    public function results(Request $request){

    }

    public function goals(Request $request){

    }

}
