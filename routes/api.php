<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
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
//All secure URI's
    
//User
    Route::post('/logout',[UserController::class,'logout']);  

//ToDoList
    Route::get('/category-list',[ToDoListController::class,'getCategory']);
    Route::get('/list',[ToDoListController::class,'getListByUserId']);
    Route::post('/add',[ToDoListController::class,'store']);
    Route::get("/filter",[ToDoListController::class,'filterlist']);

//Task
    Route::post("/add-task",[TaskController::class,'create_todo_task']);
    Route::get("/task/{task_id}",[TaskController::class,'getTaskById']);
    Route::put("/edit/{task_id}",[TaskController::class,'updateTask']);
    Route::patch("/update-status",[TaskController::class,'updateStatus']);
    Route::get("/dashboard",[TaskController::class,'dashboard']);  
});

//User
Route::post("/signup",[UserController::class,'signup']);
Route::post("/login",[UserController::class,'login'])->name('login');

