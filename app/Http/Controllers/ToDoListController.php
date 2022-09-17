<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function getListByUserId(Request $request) {
        $userId =  (int)$request->userId;
        $toDoList = ToDoList::where('userId','=',$userId)->get();
        return $toDoList;
    }
    
    public function store(Request $request) {
        $toDoList = ToDoList::create($request->all());
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
}
