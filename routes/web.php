<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
// using gate in route
// Route::get('/gate',[AuthorizationController::class,'index'])->name('gate.name')->middleware('can:isAdmin');

// using gate in controller
Route::get('/gate',[AuthorizationController::class,'index'])->name('gate.index');

Route::get('/posts',[PostController::class,'index'])->name('post.index');
Route::get('/show/{post}',[PostController::class,'show'])->name('post.show')->middleware('can:view,post');
Route::get('/delete/{post}',[PostController::class,'destroy'])->name('post.delete');