<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\customerProductController;
use App\Http\Controllers\ManyCustomersProducts;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.index');
// });
Route::group(['prefix'=>'/'],function(){
    Route::resource('/customer',CustomerController::class);    
    Route::resource('/customer-product',customerProductController::class);
    Route::resource('/many-customers-products',ManyCustomersProducts::class);
});




