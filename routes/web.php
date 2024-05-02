<?php

use App\Http\Controllers\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
//     return view('welcome');
// });

// Route::get('/home', function (){
//     return "<h1>Welcome</h1>";
// });

// Route::get('/first',function(){
//     return view('home',["name"=>'jega']);
// });

// Route::get('home/index',function (){
//     return view('mastersInformation');
// });
// Route::get('/about',function(){
//     return view('about');
// });

Route :: get('/user-form',function(){
    return view('userFormForPostRouting');
});

Route :: post('get-data',function(Request $req){
    // echo "hii";
    dd($req->all());
});

Route :: get('input',function(){
    return view('getAllInputs');
});
//redirect
Route :: post('getAll',function(Request $req){
    $text1=$req->input('txt1');
    $text2=$req->input('txt2');

    echo "text one is $text1, and text two is $text2";
    return redirect('input')->with('msg','send successfully');
});
//passing the data into view
Route :: get('/passingData',function(){
    $data="hii user";
    //return view('passingThedata',['msg'=>$data]);
    // return view('passingThedata',compact('data'));
    return view('passingThedata')->with('msg',$data)->with('msg2',$data);
    // return view('passingThedata')->withData($data);
});

//route parameters
Route :: get('/sample-page/{id}/{type?}',function($id,$type=null){
    // return $id." ".$type;
    if($id==1 && $type=='hi')
    {
        return "welcome";
    }
    else if($id==6){
        return "hello";
    }
    else{
        return "bye";
    }
});

Route :: view('sample-page','page');

//named routes
Route ::get('hello/{id}/{name?}',function($id,$name=null){
    if($id==1 && $name=='first')
    {
        return "this is first page";
    }
    else if($id==1 && $name=='second')
    {
        return "this is second page";
    }
    else if($id==1){
        return "this third page";
    }

})->name('test');

Route :: view('named-routes','page');


//route groups
Route::prefix('gallery')->group(function(){
    Route :: get('photos',function(){
        return "photos";
    });
    Route::get('videos',function(){
        return "videos";
    });
});

//controller
Route::get('login',[test::class,'login']);
Route::get('logout',[test::class,'logout']);


//blade layout
// Route::view('layout','Layouts.default');

Route::view('homepg','homepg');
Route::view('contactpg','contact');