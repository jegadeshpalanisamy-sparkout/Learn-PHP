<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getCustomerDetails=Customer::all();
        return view('Customer.home',compact('getCustomerDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Customer.create');
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
        $getAllDetails=$request->validate(
            [
                'name'=>'required|min:3|string',
                'phone_number'=>'required|numeric|min:10',
                'email'=>'required|email',
                'address'=>'required|string',
                'gender'=>'required',
                'profile_picture'=>'required',
                'status'=>'required',

            ], [
                'name.required' => 'The name field is required.',
                'name.min' => 'The name must be at least min 3 characters.',
                'phone_number.required' => 'The phone number field is required.',
                'phone_number.numeric' => 'The phone number must be numeric.',
                'phone_number.min' => 'The phone number must be 10 digits.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'address.required' => 'The address field is required.',
                'gender.required' => 'The gender field is required.',
                'profile_picture.required' => 'Please upload a profile picture.',
                'status.required' => 'The status field is required.',
            ]
            );

            $getLoginDetails=$request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'ip_address' => 'required',
                'status' => 'required'
            ],[
                'username.required' => 'The username field is required.',
                'password.required' => 'The password field is required.',
                'status' => 'The status field must be one of: active,inactive.',
            ]
            );
             $getLoginDetails['password']=Hash::make($getLoginDetails['password']);
            
            
        //    dd($getAllDetails);
        if(isset($getAllDetails) && isset($getLoginDetails)){
            $save=Customer::create($getAllDetails);
           
            $save->customer_login_details()->create($getLoginDetails);           
            //return redirect()->route('index',compact('getAllDetails'))->with('message','Customer and customer details was added successfully');
            return redirect()->route('customer.index')->with('message','Customer and customer details was added successfully');

            
        }
        else{
            return redirect()->route('customer.index')->with('message','Customer details was cannot added');
            // dd($getAllDetails);
        }
            
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
       $getCustomerDetails=Customer::with('customer_login_details')->whereId($id)->get();
    //    dd($getCustomerDetails);
       return view('Customer.show',compact('getCustomerDetails'));
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
        $getCustomer=Customer::with('customer_login_details')->whereId($id)->first();
        // dd($getCustomer);
         return view('Customer.edit',compact('getCustomer'));
        
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
        //
        // dd($id);
        $getCustomer_update=Customer::with('customer_login_details')->whereId($id)->first();

        $getAllDetails=$request->validate(
            [
                'name'=>'required|min:3|string',
                'phone_number'=>'required|numeric|min:10',
                'email'=>'required|email',
                'address'=>'required|string',
                'gender'=>'required',
                'profile_picture'=>'required',
                'status'=>'required',

            ], [
                'name.required' => 'The name field is required.',
                'name.min' => 'The name must be at least min 3 characters.',
                'phone_number.required' => 'The phone number field is required.',
                'phone_number.numeric' => 'The phone number must be numeric.',
                'phone_number.min' => 'The phone number must be 10 digits.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'address.required' => 'The address field is required.',
                'gender.required' => 'The gender field is required.',
                'profile_picture.required' => 'Please upload a profile picture.',
                'status.required' => 'The status field is required.',
            ]
            );

            $getLoginDetails=$request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'ip_address' => 'required',
                'status' => 'required'
            ],[
                'username.required' => 'The username field is required.',
                'password.required' => 'The password field is required.',
                'status' => 'The status field must be one of: active,inactive.',
            ]
            );

            

            $getCustomer_update->update([
                'name' => $getAllDetails['name'],
                'phone_number' => $getAllDetails['phone_number'],
                'email' => $getAllDetails['email'],
                'address' => $getAllDetails['address'],
                'gender' => $getAllDetails['gender'],
                'profile_picture' => $getAllDetails['profile_picture'],
                'status' => $getAllDetails['status'],
            ]);

            $getCustomer_update->customer_login_details->update([
                'username' => $getLoginDetails['username'],
                'password' => Hash::make($getLoginDetails['password']),
                'ip_address' => $getLoginDetails['ip_address'],
                'status' => $getLoginDetails['status'],
            ]);
            return redirect()->route('customer.index')->with('message', 'Customer and customer details were updated successfully');


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
        $getDetail=Customer::with('customer_login_details')->whereId($id)->first();
        // dd($getDetail);
        if(isset($getDetail))
        {
            $getDetail->delete();
            $getDetail->customer_login_details->delete();
            return redirect()->route('customer.index')->with('message','Customer details was deleted successfully');
        }

        else{
            return redirect()->route('customer.index')->with('message','Customer details was cannot deleted');   
        }

    }
}
