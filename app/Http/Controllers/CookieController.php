<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //

    public function createCookie(){
        $min=3;
        $response=new Response("Cookie was set successfully");
       $response->withCookie(cookie('name','jegadesh',$min));
        // dd($data);
        return $response;
    }

    public function getCookie(Request $request){
        $value=$request->cookie('name');
        dd($value);
    }
}
