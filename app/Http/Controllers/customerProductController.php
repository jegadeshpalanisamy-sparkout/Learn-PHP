<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class customerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product=Product::all();
        return view('Customer_Product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $getAllCustomers=Customer::all();
        return view('Customer_Product.create',compact('getAllCustomers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $productDetailsValidate=$request->validate([
            'productName'=>'required|string|unique:products,product_name',
            'customer'=>'required',
            'qty' => 'required|integer|min:1',
            'per_amt' => 'required|numeric|min:0',
            'tol_amt' => 'required|numeric|min:0',
            'status' => 'required',
            'multi_customer'=>'required|array'
       ],[
            'productName.required' => 'The product name field is required.',
            'customer.required' => 'Please select a customer.',
            'qty.required' => 'The quantity field is required.',
            'qty.integer' => 'The quantity must be an integer.',
            'qty.min' => 'The quantity must be at least :min.',
            'per_amt.required' => 'The per amount field is required.',
            'per_amt.numeric' => 'The per amount must be a number.',
            'per_amt.min' => 'The per amount must be at least :min.',
            'tol_amt.required'=>'Total amount is must needed',
            'status'=>'status field is must please select status'
       ]);
    // dd($productDetailsValidate);
       $product=new Product();
       
       $product->product_name=$productDetailsValidate['productName'];
       $product->customer_id=$productDetailsValidate['customer'];
       $product->quantity=$productDetailsValidate['qty'];
       $product->per_amount=$productDetailsValidate['per_amt'];
       $product->total_amount=$productDetailsValidate['tol_amt'];
       $product->status=$productDetailsValidate['status'];
       $product->save();
       $product->customers()->attach($productDetailsValidate['multi_customer']);

       
        return redirect()->route('customer-product.index')->with('message', 'Product added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        // $customers=Customer::with('product')->whereId($id)->first();
        // return view('Customer_Product.edit',compact('customers'));
        $customers=Customer::all();
        $product=Product::find($id);
        return view('Customer_Product.edit',compact('customers','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // dd($request);
        // $customer=Customer::findOrFail($request->customer_id)->products()->whereId($id)->first();
        // $customer=Customer::with('product')->whereId($id)->first();
        // dd($customer);
        $product = Product::find($id);
        
        $productDetailsValidate=$request->validate([
            'productName'=>'required|string',
            'customer'=>'required',
            'qty' => 'required|integer|min:1',
            'per_amt' => 'required|numeric|min:0',
            'tol_amt' => 'required|numeric|min:0',
            'status' => 'required',
            'multi_customer'=>'required|array'
       ],[
            'productName.required' => 'The product name field is required.',
            'customer.required' => 'Please select a customer.',
            'qty.required' => 'The quantity field is required.',
            'qty.integer' => 'The quantity must be an integer.',
            'qty.min' => 'The quantity must be at least :min.',
            'per_amt.required' => 'The per amount field is required.',
            'per_amt.numeric' => 'The per amount must be a number.',
            'per_amt.min' => 'The per amount must be at least :min.',
            'tol_amt.required'=>'Total amount is must needed',
            'status'=>'status field is must please select status'
       ]);
    //    dd($productDetailsValidate);

       $product->product_name = $productDetailsValidate['productName'];
       $product->customer_id = $productDetailsValidate['customer'];
       $product->quantity = $productDetailsValidate['qty'];
       $product->per_amount = $productDetailsValidate['per_amt'];
       $product->total_amount = $productDetailsValidate['tol_amt'];
       $product->status = $productDetailsValidate['status'];
   
       // Save the updated product
       $product->save();
       $product->customers()->sync($productDetailsValidate['multi_customer']);
    

       return redirect()->route('customer-product.index')->with('message', 'Product updated successfully!');
   
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('customer-product.index')->with('error', 'Product not found!');
        }
        else{
            $product->delete();
            return redirect()->route('customer-product.index')->with('message', 'Product deleted successfully!');
        }
    }
}
