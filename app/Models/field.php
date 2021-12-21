<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field extends Model
{
    use HasFactory;
    protected $table = 'fields';

    protected $fillable = [
        'name',
    ];

    public function games(){
        return $this->hasMany(Game::class, 'field_id', 'id');
    }
}
