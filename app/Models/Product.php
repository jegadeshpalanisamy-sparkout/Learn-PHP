<?php

namespace App\Models;

use App\Http\Controllers\customerProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        
        'product_name',
        'customer_id',
        'quantity',
        'per_amount',
        'total_amount'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }


    public function customers(){
        return $this->belongsToMany(Customer::class,customer_product::class);
    }
}
