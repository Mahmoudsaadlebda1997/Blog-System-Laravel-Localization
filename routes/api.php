<?php

use App\Http\Controllers\api\blogController;
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

Route :: get('Blog/Display', [blogController::class , 'index']);
Route :: post('Blog/Store', [blogController::class , 'store']);
Route :: delete('Blog/delete/{id}', [blogController::class , 'destroy']);
