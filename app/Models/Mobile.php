<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    public function getNetwork(){
        return $this->hasManyThrough(Network::class,Type::class);
    }
}
