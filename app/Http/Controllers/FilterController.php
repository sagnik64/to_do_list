<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterlist(Request $request)
    {        
        $filterResult = Task::where('category',$request->category."%")
                            ->orWhere('status',$request->status,"%")
                            ->orWhere('date',$request->date,"%")
                            ->get();

        if ($filterResult)
        {
            return $filterResult;
        }
        else
        {
            return ["Message"=>"No Matched Task Found"];
        }

    }
}
