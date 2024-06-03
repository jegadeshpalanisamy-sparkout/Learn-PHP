<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoServiceProviderController extends Controller
{
    //
    public function getDay($param)

    {
        app()->make('days')->findDay($param);
    }
}
