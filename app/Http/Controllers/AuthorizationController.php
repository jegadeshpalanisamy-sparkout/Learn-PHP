<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    //
    public function index()
    {
        // return "This page allowed to access only admin!!";
      return  Gate::allows('isAdmin')? "welcome admin this is your page" :  "Admin only can access this";
      
    }
}
