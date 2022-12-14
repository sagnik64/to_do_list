<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create_todo_task(Request $req)
    {
        $task = Task::create($req->all());

        if($task) {
            return response()->json([
                "code" => 201,
                "msg" => "created successfully",
                "id" => "$task->id"
            ],201);
        }
        return response()->json([
            "code" => 400,
            "msg" => "failed to create"
        ],400);

    }

    public function getTaskById($id)
    {
        $task = Task::where('id','=',$id)->get();
        if($task){
            return $task;
        }
        return response()->json([
            "code" => 400,
            "msg" => "failed to find task"
        ],400);
        
    }

    public function getTaskByUserId($userId)
    {
        $task = Task::where('userId','=',$userId)->get();
        if($task){
            return $task;
        }
        return response()->json([
            "code" => 400,
            "msg" => "failed to find task"
        ],400);
    }

    

    public function updateTask(Request $request, $id){
        $task = Task::find($id);
        $task->update($request->all());

        if($task) {
            return $task->where('id','=',$id)->get();
        }
        return response()->json([
            "code" => 400,
            "msg" => "failed to update task"
        ],400);
    }

    public function updateStatus(Request $request)
    {
        $task = Task::find($request->id)->update(['status'=>$request->status]);
        if($task){
            return response()->json([
                "code" => 200,
                "msg" => "status updated successfully"
            ],200);
        }
        return response()->json([
            "code" => 400,
            "msg" => "failed to update"
        ],400);
    }

    public function dashboard (Request $request) {
        $totalTask = Task::where('userId','=',$request->userId)->count();
        
        $completedTask = Task::where('userId','=',$request->userId)->where('status','=',1)->count();
        return [[
            'total_task' => $totalTask,
            'due_task' => ($totalTask - $completedTask),
            'completed' => $completedTask
        ]];
    }
}
