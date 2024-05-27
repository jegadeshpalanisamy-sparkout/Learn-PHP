<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultiFormValidationController extends Controller
{
    //
   
    public function index(){
        return view('multiForm.index');
    }

        public function store(Request $request){
            // $request->validate([
            //     'name'=>'required',
            //     'age'=>'required'
            // ]);
           
            // public $hii;
            // protected $hii;
            $request->validateWithBag('form_1',[
                'name'=>'required',
                'age'=>'required'
            ]);
            $request->validateWithBag('form_2',[
                'name'=>'required',
                'age'=>'required'
            ]);
        // Redirect back with errors if validation fails
        
        }
    }
