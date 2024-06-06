<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderPlaceController extends Controller
{ 
    //
    public function placeOrder(Request $request)
    {
    //    dd($request);
        $order=new Order();
        $order->name=$request->name;
        $order->email=$request->email;
        // dd($order);
        $order->save();
        

        // event(new OrderPlaced($order));//method 1
    OrderPlaced::dispatch($order);//method 2
                                            //method 3 in model
    }
}
