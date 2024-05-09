<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Worker extends Model
{
    use HasFactory;

    public function getCompany()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
