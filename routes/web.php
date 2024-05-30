<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\demoSingleActionController;
use App\Http\Controllers\EmployeePhoneController;
use App\Http\Controllers\form_handling_validationController;
use App\Http\Controllers\LearnMiddlewareController;
use App\Http\Controllers\Member;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\MultiFormValidationController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProductCustomRequestController;
use App\Http\Controllers\products;
use App\Http\Controllers\RawQueryController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\test;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Eloquent;
use App\Models\Employe;
use App\Models\Mobile;
use App\Models\Player;
use App\Models\Post;
use App\Models\Team;
use App\Models\Worker;
use Illuminate\Support\Str;
use App\Http\Middleware\CheckNumberIndays;

use App\Http\Controllers\Auth\LoginController as AuthLogin;
use App\Http\Controllers\MarkDownMailContoller;
use App\Http\Controllers\MemberControllerForExceptionHandling;
use App\Http\Controllers\OrderPlaceController;
use App\Http\Controllers\TestMailController;
use App\Models\Phone;
use App\Models\Type;
use Carbon\PHPStan\Macro;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
 Route::get('employe/{id}',[EmployeePhoneController::class,'show']);

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


//many to many
Route::get('many-to-many',function(){
     $Teams=Team::with('getPlayer')->whereId(2)->get();
     return Response::json($Teams);
});


Route::get('/many-to-manys',function(){
    $player=Player::with('getTeam')->whereId(1)->get();
    return Response::json($player);
});


//has many through
Route::get('/has-many-through',function(){
//      $MO=Mobile::with('getNetwork')->whereId(3)->get();
//     $mob=Mobile::find(3);
//    $mobile=$mob->getNetwork;
//     dd($mobile);
//     dd($MO->network);
$mob = Mobile::with('getNetwork')->find(3);
 $mobile = $mob->getNetwork;
dd($mobile);

});

//create sample data with collection

Route::get('/learn-collection',function(){
    $data=[
        ['name'=>'jega','age'=>21],
        ['name'=>'arun','age'=>22],
        ['name'=>'john','age'=>15]
    ];

   // $collection=new Collection($data);
   $collection=collect($data);
    //  dd($collection);
    // return $collection;

    // using where to filter the collection data
    $filter=$collection->where('age','>=',21);

    $mapped=$collection->map(function($item){
        return $item['name']."and".$item['age'];
    });

    dd($mapped);
    // return $filter;
    
});


//using map in collection
Route::get('/map-collection',function(){
    $collection=collect(['CRICKET','FOOTBALL',null])->map(function($sport){
        return strtolower($sport);
    })->reject(function($name){
        return empty($name);
    });
    dd($collection);
});

//extending collection
Route::get('/extending-method',function(){
    // Collection::Macro('toUpper',function()
    // {
    //     return $this->map(function($value){
    //         return Str::upper($value);
    //     });
    // });
    // $collection=collect(['first','second']);
    // $upper=$collection->toUpper();
    // return $upper;

    Collection::macro('sum',function(){
        return $this->map(function($args){
            $sum=0;
           $sum=$sum+$args;
        });
    });
    $collection=collect([1,2,3]);
    $sum=$collection->sum();

    return $sum;


});
Route::get('/accessors',[memberController::class,'index']);
Route::get('/mutator',[memberController::class,'create']);
Route::get('/load-learn',[memberController::class,'show']);

//Raw Query 
Route::prefix('/raw-queries')->group(function(){
    Route::get('/index',[RawQueryController::class,'index']);
    Route::get('/create',[RawQueryController::class,'create']);
    Route::get('update',[RawQueryController::class,'update']);
    route::get('delete',[RawQueryController::class,'delete']);
}   
);




//collection methods
Route::get('collection-methods',function(){
    $data=[5,7,9,8,4,6,7,4,2,1,3];
    $data2=[10,20,30];
    $collection=collect($data);
    // dd($collection->all());
    // dd($collection->avg());



    // $multidimensionalData=[
    //     ['apple','red'],
    //     [1,2,3]
    // ];

    $multidimensionalData=[
        ['name'=>'apple','rate'=>200],
        ['name'=>'mango','rate'=>400]
    ];
    $multiDatas=collect($multidimensionalData);
    // dd($multiDatas->collapse());

    // dd($collection->chunk(3));
    $data3=$collection->concat($data2);
    // dd($data3);

    $key=collect(['name','age']);
    $combined=$key->combine(['jega',22]);
    // dd($combined);

    // dd($collection->contains(1));

    dd($collection);
});

//middleware
// Route::get('/days/{num}',[LearnMiddlewareController::class,'index'])->middleware("day");
Route::get('/days/{num}',function($num){
    if($num==1)
    {
        return "sunday";
    }
    else if($num==2){
        return "monday";
    }
    
    
})->middleware('day');   //or middleware(CheckNumberIndays::class);

//grouped middleware

Route::view('middleware-noaccess','learn-middleware.no_access');

// Route::group(['middleware'=>['protectedPage']],function(){    
//     Route::view('middleware-home/{age}','learn-middleware.home');
//     Route::view('middleware-about/{age}','learn-middleware.about');
// });

Route::middleware(['protectedPage'])->group(function()
{    
    Route::view('middleware-home/{age}','learn-middleware.home');
    Route::view('middleware-about/{age}','learn-middleware.about');
});


//pagination

Route::get('/pagination',[PaginationController::class,'show']);

Route::view('/learn-js-prototype','prototype');

//file upload
// Route::get('/file',[FileController::class,'index']);
// Route::post('/upload',[FileController::class,'upload']);


Route::prefix('/file')->group(function(){
    Route::get('/',[FileController::class,'index'])->name('index');
    Route::post('/store',[FileController::class,'store'])->name('store');
    Route::get('/show',[FileController::class,'show'])->name('show');

});


//session

Route::get('/store-session-data',function(Request $request){
    $request->session()->put(['name'=>'jegadesh','age'=>21]);
    $request->session()->put('email','jega@gmail.com');//this is one way
    //this is another way to store a session value
    session([
        'name'=>'jega',//it will be overrided to previous name
        'from'=>'tirupur',
        'mobile'=>8765432190
    ]);

//   $request->session()->flash('status','success fully added data'); //this flash data will available current request
     return "data will be saved successfully";

   
    
});

Route::get('/get-session-data',function(Request $request){
    // difference type of ways to get session data
    // dd(session()->all());
   echo session() ->get('name'). '<br>';
   echo session('from'). '<br>';

    //when if retrived wrong value
    if(session()->has('mobile'))
    {
        echo session('mobile');
    }
    else{
        echo "the value cannot have in this session";
    }

    echo "<br>";
     echo $request->session()->get('number','default value');//number var cannot have in this session so can i set default value
    dd( $request->session()->get('number',function(){
        return "hello i am default value";
    }));

});

Route::get('/delete-session-data',function(Request $request){
    // $request->session()->forget('mobile');//it delete particular datas
    // $request->session()->forget(['name','age']);
    $request->session()->flush();//it delete all datas

    return 'data was deleted';
});


Route::view('/session-login','login-session.login');
Route::post('/store',[LoginController::class,'store']);
Route::view('/profile','login-session.profile');
Route::get('/logout-session',[LoginController::class,'logout']);



//Cookies
Route::prefix("/cookie")->group(function(){
    Route::get('/set',[CookieController::class,'createCookie']);
    Route::get('/get',[CookieController::class,'getCookie']);
});

//custom request to validate
Route::get('/custom-req-index',[ProductCustomRequestController::class,'index']);
Route::post('/custom-req-store',[ProductCustomRequestController::class,'store']);


//multi form validation
Route::prefix('multi-form-validation')->group(function(){
    Route::get('/',[MultiFormValidationController::class,'index']);
    Route::post('/store',[MultiFormValidationController::class,'store']);
});


//manual authentication
        //registration
Route::view('/auth','auth.login')->middleware('guest')->name('login');
Route::get('/auth-create',[RegisterController::class,'create'])->middleware('guest');
Route::post('/auth-store',[RegisterController::class,'store']);
Route::view('/home','auth.home')->middleware('auth');      
        //login
Route::post('/auth-login',[AuthLogin::class,'loginAuthentication']);
Route::get('/auth-logout',[AuthLogin::class,'logout']);


//js DOM
Route::view('/js-dom','JS-DOM.dom');


//Exception Handling
Route::get('/exception',[MemberControllerForExceptionHandling::class,'index']);
Route::get('/exception-search',[MemberControllerForExceptionHandling::class,'show'])->name('member.search');

//mail

Route::get('/mail',[TestMailController::class,'index']);

//markdown mail
Route::get('/markdown-mail',[MarkDownMailContoller::class,'index']);