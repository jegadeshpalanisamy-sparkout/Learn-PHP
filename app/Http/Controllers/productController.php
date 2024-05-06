<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

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
      //  $data = $request->only(['name', 'price']); 
      $data=$request->validate([
        'name'=>['Required','string'],
        'price'=>['Required','numeric']
      ]);

        $save = product::create($data);
        // return redirect(route('index'));
        return redirect(route('welcome'))->with('success',"added successfully");
    }
    public function show()
    {
        $Alldata=product::all();
        return view('product.index',compact('Alldata'));
    }

    public function edit(product $product)
    {
        // dd($product);
        return view('product.edit',['product'=>$product]);
    }
    public function update(product $product,Request $req)
    {
        $data=$req->only(['name','price']);
        $product->update($data);
       return redirect(route('welcome'))->with('success','product update successfully');
    }
    public function delete(product $product)
    {
        $product->delete();
       return redirect(route('welcome'))->with('success','product was deleted successfully');
    }
}
