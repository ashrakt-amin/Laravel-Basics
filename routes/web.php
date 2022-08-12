<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\DeleteAllController;
use App\Http\Controllers\ImageController;
use App\Mail\SendMail;
use App\Models\Image;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'verify']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{name}', function ($name) {
   
        return $name;
    
});

Route::get('/index', function () {
  
    return view('');

});

Route::get('/allusers', function () {
  
    // return view('users');

});

Route::middleware(['checkUser'])->group(function () {
    Route::resource('/posts',PostController::class);
    Route::get('delete/posts',[PostController::class ,'delete'])->name('posts.delete');
    Route::get('delete/truncate',[PostController::class ,'truncate'])->name('posts.delete.truncate');
    Route::get('trash',[PostController::class ,'trashedPosts'])->name('posts.softDelete');
    Route::get('restore/{id}',[PostController::class ,'restore'])->name('posts.restore');
    Route::get('forceDelete/{id}',[PostController::class ,'forceDelete'])->name('posts.forceDelete');
    Route::get('markasRead',[PostController::class ,'markall'])->name('mark');
    Route::get('updatequeue',[PostController::class ,'updatequeue'])->name('queue');

    Route::resource('/image',ImageController::class);


});

Route::resource('/getusers',UserController::class);
 
Route::get('send',[PostController::class ,'send']);
  


// Route::controller(PostController::class)->group(function(){
//    Route::get('/posts','index');
//    Route::get('/post/create','create');
//    Route::post('/post/insert','insert')->name('post.insert');
//    Route::PUT('/post/update/{id}','update')->name('post.update');



// });

Route::resource('/users' ,UserController::class)->except([
    'show'
])->middleware('auth');

Route::get('invoke',InvokeController::class);
// Route::get('/posts',[PostController::class,'index']);

// Route::post('/users',function(Request $request){
//     return $request;
// });


