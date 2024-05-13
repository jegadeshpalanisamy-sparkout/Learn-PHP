<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
   protected $table='customers';
   protected $fillable=[
    
    'name',
    'phone_number',
    'email',
    'address',
    'gender',
    'profile_picture',
    'status'
    
   ];

   public function customer_login_details()
   {
    return $this->hasOne(Customer_login_detail::class,'customer_id');
   }

   public function Product()
   {
    return $this->hasMany(Product::class,'customer_id','id');
   }

   public function Products()
   {
    return $this->belongsToMany(Product::class,customer_product::class);
   }
}
