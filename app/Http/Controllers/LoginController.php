<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    //store the session value
    public function store(Request $request)
    {
    //   dd($request->all());
       $request->session()->put(
            ['name' => $request->name],
            ['password' => $request->password]
        );
    //    echo session('name');
    return redirect('profile');
       
    }
    //delete and logout the session value
    public function logout()
    {
        
        if(session()->has('name')){
            
            session()->flush('user');
            
            return redirect('session-login');
        }
        
    }
}
