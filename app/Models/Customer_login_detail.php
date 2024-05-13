<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_login_detail extends Model
{
    use HasFactory;

    protected $table='customer_login_details';
    protected $fillable=[
        'username',
        'password',
        'last_seen',
        'ip_address',
        'status'
    ];
}
