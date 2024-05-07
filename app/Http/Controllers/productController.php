<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;


class productController extends Controller
{
     //display the all product lists
    public function welcome()
    {
        return view('product.index');
    }
    //create new product
    public function index()
    {
        return view('product.create');
    }
    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        try{
            $data=$request->validate([
                'name'=>['Required','string'],
                'price'=>['Required','numeric']
              ]);
        
                $save = product::create($data);
                if(isset($save))
                {
                    return redirect(route('welcome'))->with('message',"added successfully");
                }
                
                else{
                    return redirect(route('index'))->with('error',"Data not stored");
                }


        }
        catch(\Exception $e)
        {
            return redirect(route('index'))->with('error',"An error occurred: ".$e->getMessage());
        }
    
       
    }
    public function show()
    {
        $getAllProducts=product::all();
        return view('product.index',compact('getAllProducts'));
    }
    //edit product 
    public function edit(product $product)
    {
        // dd($product);
        return view('product.edit',['product'=>$product]);
    }
    public function update(product $product,Request $request)
    {
        try{
            $data=$request->validate([
                'name'=>['Required','string'],
                'price'=>['Required','numeric']
              ]);     
        
                $product->update($data);
               return redirect(route('welcome'))->with('success','product update successfully');
        }
       catch(\Exception $e){
            return redirect()->back()->withInput()->with('error','An error occured'.$e->getMessage());
       }
      
    }
    public function delete(product $product)
    {
        $product->delete();
       return redirect(route('welcome'))->with('success','product was deleted successfully');
    }
}
