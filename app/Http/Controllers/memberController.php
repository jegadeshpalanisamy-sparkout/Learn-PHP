<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Member;

class memberController extends Controller
{
    //
    public function index()
    {
        $data=Member::all();
        return $data;
    }
    public function create()
    {
        $member=new Member();
        $member->name="ram";
        $member->city='tirupur';  
        $save=$member->save();
        if($save)
        {
            return "Save successfully";
        }
        
    }
}
