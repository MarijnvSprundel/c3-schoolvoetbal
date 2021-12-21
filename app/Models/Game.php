<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'team1_id',
        'team2_id',
        'team1_score',
        'team2_score',
        'round_num',
        'datetime',
        'field_id',
        'referee_id',
    ];

    public function team_1(){
        return $this->hasOne(Team::class, 'id', 'team1_id');
    }
    public function team_2(){
        return $this->hasOne(Team::class, 'id', 'team2_id');
    }
    public function field(){
        return $this->hasOne(Field::class, 'id', 'field_id');
    }
    public function referee(){
        return $this->hasOne(User::class, 'id', 'referee_id');
    }
}
