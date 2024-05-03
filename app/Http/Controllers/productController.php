<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function welcome()
    {
        return view('product.index');
    }
    public function index()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $request->only(['name', 'price']);

        $save = product::create($data);
        // return redirect(route('index'));
        return "added successfully";
    }
    public function show()
    {
        $Alldata=product::all();
        return view('product.index',compact('Alldata'));
    }

    public function edit(product $product)
    {
        dd($product);
    }
}
