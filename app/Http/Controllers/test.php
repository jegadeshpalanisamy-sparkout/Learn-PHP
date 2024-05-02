<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function login()
    {
        return "login successfully";
    }
    public function logout()
    {
        return "logout successfully";
    }
}
