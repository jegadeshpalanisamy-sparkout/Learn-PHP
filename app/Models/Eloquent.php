<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eloquent extends Model
{
    use HasFactory;
   protected $table="_eloquents";

   protected $fillable=['name','age','description'];

   protected $casts=[
    'name'=>'string'
   ];

   protected $hidden=[
    'created_at',
    'updated_at'
   ];

   protected $appends=[
    'name_age'
   ];

   public function getNameAgeAttribute(){
    return $this->name.'-'.$this->age;
   }
}
