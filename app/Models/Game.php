<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use mysql_xdevapi\Table;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'team1_id',
        'team2_id',
        'team1_score',
        'team2_score',
        'field_id',
        'referee_id',
    ];

    public function team1(){
        return Team::where('id', $this->team_id1)->get();
    }
    public function team2(){
        return Team::where('id', $this->team_id2)->get();
    }

}
