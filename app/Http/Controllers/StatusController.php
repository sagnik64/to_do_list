<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Task;

class StatusController extends Controller
{
    public function updateStatus(Request $request)
    {
        $data = Task::find($request->id)->update(['status'=>$request->status]);
        if($data){
            return ["Result"=>"Status Updated Successfully."];
        }
        else{
            return ["Result"=>"Status Updation Failed."];
        }
    }
}
