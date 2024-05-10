<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeePhoneController extends Controller
{
    //
    public function show(int $id)
    {
        // $employe=Employe::find($id);
        // // dd($emp);   
        // $phone=$employe->phone;
        $employe=Employe::with('phone')->whereId(1)->first();
    
        // dd($phone);
        return view('one-to-one.showEmpDetails',compact('employe'));
    }
}
