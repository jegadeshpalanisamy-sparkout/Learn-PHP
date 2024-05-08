<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valitation extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'stock',
        'is_active'
    ];
}
