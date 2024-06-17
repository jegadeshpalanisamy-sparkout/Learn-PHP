<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MultiplePerson;
use Illuminate\Http\Request;

class MultiPersonController extends Controller
{
    //
    public function index()
    {
      
        $persons=MultiplePerson::all();
        return view('multi-person.index',compact('persons'));
    }

    public function getParent($parent)
    {
        $persons=MultiplePerson::all();
        $getParent=MultiplePerson::where('parent',$parent)->get();
        return view('multi-person.index',compact('getParent','persons'));
    }
}
