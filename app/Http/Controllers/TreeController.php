<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TreeNodes;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    //
    public function index()
    {
        // $persons = TreeNodes::whereNull('parent_id')->get();
        $persons = TreeNodes::whereNull('parent_id')->with('children')->get();
        // dd($persons); 
        return view('TreeNodes.index', compact('persons'));
    }

    // public function getChildren($id)
    // {
    //     $person = TreeNodes::findOrFail($id);
    //     $children = $person->children;
    //     return response()->json($children);
    // }

   
}
