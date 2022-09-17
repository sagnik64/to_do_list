<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $total_task_count = count(Task::all());
        $due_task_count = count(Task::where('status',1)->get());
        $completed_task_count = count(Task::where('status',2)->get());

        return [
            "total_task "=> $total_task_count,
            "due_task "=> $due_task_count,
            "completed_task "=> $completed_task_count,
        ];

    }
}
