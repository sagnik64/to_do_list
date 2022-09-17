<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        "total_task",
        "due_task",
        "completed_task"
    ];

    protected $casts = [
        "integer" => "total_task",
        "integer" => "due_task",
        "integer" => "completed_task"
    ];
}
