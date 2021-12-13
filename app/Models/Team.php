<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
<<<<<<< HEAD
=======

    protected $fillable = [
        'name',
        'creator_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
>>>>>>> 3443924e5efa1c7cb206c95999b623c40f500713
}
