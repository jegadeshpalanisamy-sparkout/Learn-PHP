<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    public $timestamps=false;
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getCityAttribute($value)
    {
        return ucfirst($value."-TN");
    }
    public function setNameAttribute($value){
        $this->attributes['name']="Mr.".$value;
    }
    public function setCityAttribute($value){
        $this->attributes['city']=ucfirst($value)."-TN";
    }

    public function Roles(){
        return $this->hasMany(Role::class);
    }
    
}
