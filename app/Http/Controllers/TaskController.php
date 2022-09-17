<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create_todo_task(Request $req)
    {
        $data = Task::create($req->all());

        if($data) {
            return response()->json([
                "message" => "To Do Created successfully",
                "data" => $data
            ],201);
        }
        return response()->json([
            "success" => "false",
            "code" => 400,
            "message" => "Failed to Create To Do."
        ],400);

    }

    public function showTaskById($id)
    {
        $data = Task::find($id);

        if($data)
        {
            $details = ["id"=>$data->id,
            "title"=>$data->title,
            "status"=>$data->status,
            "category"=>$data->category,
            "remark"=>$data->remark,
            "date"=>$data->date];
            return $details;
        }
        else
        {
            return ["Message"=>"Task Not Found."];
        }
    }
}
