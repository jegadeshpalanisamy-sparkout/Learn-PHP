<?php

use App\Http\Controllers\demoSingleActionController;
use App\Http\Controllers\form_handling_validationController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\productController;
use App\Http\Controllers\products;
use App\Http\Controllers\studentController;
use App\Http\Controllers\test;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Eloquent;
use App\Models\Employe;
use App\Models\Post;
use App\Models\Worker;


use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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

//CRUD
Route::get('product',[productController::class,'show'])->name('welcome');
Route::get('product/create',[productController::class,'index'])->name('index');
Route::post('product',[productController::class,'store'])->name('store');
Route::get('product/{product}/edit',[productController::class,'edit'])->name('edit');
Route::put('product/{product}/update',[productController::class,'update'])->name('update');
Route::delete('product/{product}/delete',[productController::class,'delete'])->name('delete');

//single action controller
Route::get('/',demoSingleActionController::class);

//resource controller ,resource route
Route::resource('student',studentController::class);


//Learn Eloquent model
Route ::get('/eloquent',function(){
    return  Eloquent::get();
});


//form-validation
 Route::get('formindex',[form_handling_validationController::class,'index']);
 Route::post('store',[form_handling_validationController::class,'store'])->name('valitation.store');


 //Model-Relationships
 //one to one
 Route :: get('/one-to-one',function(){
//    $emp= Employe::find(1);
    $emp=Employe::with('phone')->whereId(1)->first();
    return Response::json($emp);
//    dd($emp->phone);
 });


 //inverse one to one
 Route::get('/inverse-one-to-one',function(){
    // $phone=Phone::find(1);
    $phone=Phone::with('employe')->whereId(1)->first();
    return Response::json($phone);
    // dd($phone);

 });

 //update data---- one-to-one
 Route::get('/one-to-one-update',function(){
    $emp=Employe::find(2);
    $phone=new Phone();
     $phone->phone='823787890';
    // $emp->phone()->save($phone); ---its does not update--it added new datas
    // return 'saved';
    $emp->phone()->update($phone->toArray());//it must be typed array
    return "updated";
 });

 //change foreignkey to employee----one-to-one
 Route::get('/change-fk',function(){
    $emp=Employe::find(2);
    $phone=Phone::find(2);

    $phone->employe()->associate($emp)->save();
    return 'successfully updated forign key';
 });



 Route::get('/company',function(){
    $workers=Company::with('getWorkers')->whereId(1)->get();
    return Response::json($workers);
 });


 Route::get('/worker',function(){
    $company=Worker::with('getCompany')->whereId(3)->first();
    return Response::json($company);

 });


 //one-to-mamy
 Route::get('/one-to-many',function(){
    $post=Post::with('getComment')->whereId(1)->first();
    // dd($post);
    return Response::json($post);
 });

 Route::get('/comments',function(){
    $cmd=Comment::with('getPost')->whereId(5)->get();
    return Response::json($cmd);
 });

//insert value ---one to many
Route::get('/insert-one-to-many',function(){
  $post=Post::find(1);
  $command=new Comment();
  $command->name='fourth commant';
  $post->getComment()->save($command);
  return 'success';

});