<?php

namespace App\Http\Controllers;

use App\Models\field;
use App\Models\Game;
use App\Models\Team;
use App\Http\Controllers\Fixture;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
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

        $fieldTimeSlots = array();
        $timeSlotCount = 8;
        foreach ($fields as $field){
            $currentTime = Carbon::now();
            $currentTime->setHours(10);
            $currentTime->setMinutes(0);
            $currentTime->setSecond(0);
            $timeSlots = array();

            for ($i = 1; $i <= $timeSlotCount; $i++) {
                array_push($timeSlots, $currentTime->format('Y-m-d H:i:s'));
                $currentTime->addHour();
                $currentTime->addMinutes(30);
            }

            $fieldTimeSlots[$field] = $timeSlots;
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
            $field = $fields[array_rand($fields, 1)];
            $referee = $users[array_rand($users, 1)];
            $curFieldTimeSlots = $fieldTimeSlots[$field];
            $gameTimeSlot = $curFieldTimeSlots[array_rand($curFieldTimeSlots, 1)];

            $game->round_num = $i;
            $game->field_id = $field;
            $game->referee_id = $referee;
            $game->datetime = $gameTimeSlot;
            foreach($rounds as $match){
                $game->team1_id = $match[0];
                $game->team2_id = $match[1];
            }

            unset($gameTimeSlot);
            $game->save();
            $i++;
        }

        return redirect(route('tournaments'));
    }

    public function edit($id){
        $tournament = Game::findOrFail($id);
        return view('tournaments/edit')->with('tournament', $tournament);
    }

    public function update(Request $request, $id){
        $tournament = Game::findOrFail($id);
        $request->validate([
            "team_1_score"=>"required",
            "team_2_score"=>"required",
            "field_id"=>"required"
        ]);
        $tournament->team1_score=$request->team_1_score;
        $tournament->team2_score=$request->team_2_score;
        $tournament->field_id=$request->field_name;
        $tournament->save();
        return redirect(route('tournaments.edit', $id));
    }

    public function destroy($id){
        $tournament = Game::findOrFail($id);
        $tournament->delete();
        return redirect(route('tournaments'));
    }

}
