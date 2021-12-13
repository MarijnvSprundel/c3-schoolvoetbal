<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        // var_dump($teams);


        return view('dashboard')->with('teams', $teams);
    }
}
