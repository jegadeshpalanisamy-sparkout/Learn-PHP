<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\NewUserWelcomeMail;
use App\Models\NewUser;
use Illuminate\Http\Request;

class UserQueueController extends Controller
{
    //
   public function index()
   {
    return view('queue.register');
   }
    public function sendMail(Request $request)
    {
       
        $data=$request->validate([
            'name'=>'required|min:3',
            'email'=>'required',
            
         ]);
        //  dd($data);
         $user=new NewUser();
         $user->name=$data['name'];
         $user->email=$data['email'];
         $user->save();

        // dispatch(new NewUserWelcomeMail($user))->delay(now()->addSeconds(10)); //--delay 10 seconds
        dispatch(new NewUserWelcomeMail($user));
        
        dd("mail was sednd successfully");
    }
}
