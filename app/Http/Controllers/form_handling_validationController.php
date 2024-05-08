<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormRequest;
use App\Models\Valitation;

class form_handling_validationController extends Controller
{
    //
    public function index()
    {
        return view('FormHandling.product_form');
    }
    public function store(ValidationFormRequest $request)
    {
        //$request->validated();
       $data= $request->validate([
            'name'=>'required|min:3|string',
            'price'=>['required','numeric'],
            'stock'=>'required|numeric',
            'is_active'=>'sometimes'
        ],[
            'name.required'=>'Name cannot be empty',
            'name.min'=>'Name atleast 3 character'
        ]);

        
        
    }
}
