<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberControllerForExceptionHandling extends Controller
{
    //

    public function index()
    {
        
    //    throw new CustomException("Something error");
        // return response()->file('xyz.txt');
         return view('exception-learn.index');
        //  dd(view('exception-learn.index'));

       
        
    }

    public function show(Request $request)
    {
        $id=$request->memberId;
       try{
        $member=Member::findOrFail($id);
         return view('exception-learn.show',compact('member'));
         // dd($member);
       }
       catch(\Exception $e)
       {        
        // dd ($e);
        // return view('exception-learn.custom-error');
        throw new CustomException();
       }
             
       
    }
}
