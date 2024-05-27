<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //return login form
    // public function index() 
    // {
    //     return view('auth.login');
    // }

    public function loginAuthentication(Request $request){
        // return "hii";
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
       
       
        $email=$request->email;
        $password=$request->password;
        // $user=AuthUser::where('email',$email)->get();
        // dd($user);
    
        if(Auth::attempt(['email'=>$email,'password'=>$password]))
        {
        
            $user=AuthUser::where('email',$email)->first();
            // dd($user);
           Auth::login($user);
           

            return redirect('/home');
        }
        else{
            return redirect()->back()->withErrors('Invalid email or password!!');
        }
    }
    

    //logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/auth');
    }
}
