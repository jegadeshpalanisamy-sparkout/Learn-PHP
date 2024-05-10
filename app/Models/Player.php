<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function getTeam()
    {
        return $this->belongsToMany(Team::class,player_team::class);
    }
}
