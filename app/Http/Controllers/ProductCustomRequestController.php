<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductCustomRequestController extends Controller
{
    //
    public function index()
    {
        return view('custom-request.index');
    }

    public function store(StoreProductRequest $productRequest)
    {
      $validateData=  $productRequest->validate();

    }
}
