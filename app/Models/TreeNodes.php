<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeNodes extends Model
{
    use HasFactory;

    protected $fillable = ['person_name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(TreeNodes::class, 'parent_id');
    }

    // public function parent()
    // {
    //     return $this->belongsTo(TreeNodes::class, 'parent_id');
    // }
}
