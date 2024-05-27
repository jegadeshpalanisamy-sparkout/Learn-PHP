<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    //store the user register details

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:auth_users',
            'password'=>'required|min:5|confirmed'
        ]);

        $user=new AuthUser();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect('/home');
    }
}
