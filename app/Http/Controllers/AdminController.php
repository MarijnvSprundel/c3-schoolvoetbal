<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->is_admin){
            return redirect(route('admin.index'));
        }
        $users = User::all();
        return view('admin/index')
            ->with('users', $users)->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->is_admin){
            return redirect(route('admin.index'));
        }
        $dbUsers = User::findOrFail($id);
        return view('admin/edit')
            ->with('dbUsers', $dbUsers)->with('user', Auth::user());
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
        if (!Auth::user()->is_admin){
            return redirect(route('admin.index'));
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('is_admin')){
            $user->is_admin = true;
        }else{
            $user->is_admin = false;
        }
        $user->save();

        return redirect(route('admin.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->is_admin){
            return redirect(route('admin.index'));
        }
        $user = User::findOrFail($id);

        foreach ($user->teams as $team){
            foreach ($team->gamesAsTeam1 as $game){
                $game->delete();
            }
            foreach ($team->gamesAsTeam2 as $game){
                $game->delete();
            }
            $team->delete();
        }
        $user->delete();

        return redirect()->route('admin.index');
    }
}
