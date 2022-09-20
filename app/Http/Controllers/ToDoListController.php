<?php

namespace App\Http\Controllers;

use App\Models\CategoryList;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ToDoListController extends Controller
{
    public function getListByUserId(Request $request) {
        $userId =  (int)$request->userId;
        $toDoList = ToDoList::where('userId','=',$userId)->get();
        return $toDoList;
    }

    public function getCategory() {
        $category= CategoryList::all(['id','category','status']);
        return $category;
    }
    
    public function store(Request $request) {
        $toDoList = ToDoList::create($request->all());
        $category = $request->category;
        $isOldCategory = CategoryList::where('category','=',$category)->get();
        if(count($isOldCategory) === 0) {
            CategoryList::create([
                'category' => $request->category,
                'status' => 1
            ]);
        }
        
        if($toDoList) {
            return response()->json([
                "code" => 201,
                "msg" => 'created successfully',
            ],201);
        }
        return response()->json([
            "code" => 400,
            "message" => "Failed to save data"
        ],400);
    }


    public function filterlist(Request $request)
    {        
        $category = (int)$request->category;
        $status = (int)$request->status;
        $date = $request->date;
        $userId = $request->userId;

        $toDoList = ToDoList::where('category','like',$category.'%')
        ->where('status','like',$status.'%')
        ->where('date','like',$date.'%')
        ->where('userId','=',$userId)
        ->get();
        
        return $toDoList;
    }
}
