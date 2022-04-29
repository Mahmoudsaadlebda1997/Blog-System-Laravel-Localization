<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\WriterController;

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

Route :: middleware(['lang'])->group(function(){

Route::get('/', function () {
    return view('welcome');
});



// Route::get('Blade', function () {
//     return view('blades');
// });


// Route::get('User/Create',[userController::class,'Create']);
// Route::post('User/Store',[userController::class,'Store']);
// Route::get('User/prfile',[userController::class,'profile']);


Route :: middleware(['writerCheck'])->group(function(){

    Route::get('Writer/',[WriterController::class,'index']);   //->middleware('writerCheck');
    Route::get('Writer/Create',[WriterController::class,'Create']);
    Route::post('Writer/Store',[WriterController::class,'Store']);
    Route::get('Writer/delete/{id}',[WriterController::class,'destroy'])->middleware('checkDelete');
    Route::get('Writer/edit/{id}',[WriterController::class,'edit']);
    Route::post('Writer/update/{id}',[WriterController::class,'update']);



    # Blog Crud Routes
    Route::resource('Blog', blogController::class);



});








Route::get('Login',[WriterController::class,'login']);
Route::post('DoLogin',[WriterController::class,'DoLogin']);
Route::get('Logout',[WriterController::class,'logout']);




Route::get('Session',[WriterController::class,'testSession']);



  Route::get('Lang/{lang}',function ($lang){

    # SET SESSION LANGAUGE .....
    session()->put('lang',$lang);

     return back();

  });

});







