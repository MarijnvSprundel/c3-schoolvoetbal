<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams/index')
            ->with('teams', $teams)->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->creator_id = Auth::id();
        $team->save();

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teams = Team::findOrFail($id);
        return view('teams/show')->with('team', $teams);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        if (!Auth::user()->is_admin && $team->creator_id != Auth::id()){
            return redirect(route('teams.index'));
        }

        return view('teams.edit')
            ->with('team', $team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        if (!Auth::user()->is_admin && $team->creator_id != Auth::id()){
            return redirect(route('teams.index'));
        }

        $this->validate($request, [
            'name' => 'required'
        ]);

        $team->name = $request->name;
        $team->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if (!Auth::user()->is_admin && $team->creator_id != Auth::id()){
            return redirect(route('teams.index'));
        }

        foreach ($team->gamesAsTeam1 as $game){
            $game->delete();
        }
        foreach ($team->gamesAsTeam2 as $game){
            $game->delete();
        }
        $team->delete();

        return redirect()->route('teams.index');
    }
}
