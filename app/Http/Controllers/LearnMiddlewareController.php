<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearnMiddlewareController extends Controller
{
    //
    public function index($num){
        if($num==1)
        {
            return 'sunday';
        }
        else{
            return "not in day";
        }
        
    }
}
