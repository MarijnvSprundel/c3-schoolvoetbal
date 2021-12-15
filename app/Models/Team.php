<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'creator_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function gamesAsTeam1(){
        return $this->hasMany(Game::class, 'team1_id', 'id');
    }
    public function gamesAsTeam2(){
        return $this->hasMany(Game::class, 'team2_id', 'id');
    }
    public function creator(){
        return $this->hasOne(User::class,'id', 'creator_id');
    }
}
