<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ManyCustomersProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $getAllCustomers=Customer::all();
        // $getAllProducts=Product::all();
        // return view('many.index',compact('getAllCustomers','getAllProducts'));

        $all=Product::with('customers')->get();
        //  dd($all);
        return view('many.index',compact('all'));
    }

  }
