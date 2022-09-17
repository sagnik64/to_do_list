<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('/example1', function() {
        return "example1";
    });
    Route::post('/logout',[UserController::class,'logout']);
    Route::get('/list',[ToDoListController::class,'getListByUserId']);
    Route::post('/add',[ToDoListController::class,'store']);
});

Route::post("/signup",[UserController::class,'signup']);
Route::post("/login",[UserController::class,'login'])->name('login');

