<?php

use App\Http\Controllers\ApiLearnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('data',[ApiLearnController::class,'getdata']);
Route::get('/list-datas',[ApiLearnController::class,'getAllDataInDb']);
Route::get('/list-datas/{id}',[ApiLearnController::class,'getDataById']);
Route::post('/add',[ApiLearnController::class,'add']);
Route::put('/update/{id}',[ApiLearnController::class,'update']);
Route::delete('/delete/{id}',[ApiLearnController::class,'delete']);