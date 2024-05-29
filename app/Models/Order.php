<?php

namespace App\Models;

use App\Events\OrderPlaced;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email'
    ];

    protected $dispatchesEvent=[
        'saved'=>OrderPlaced::class
    ];
}
