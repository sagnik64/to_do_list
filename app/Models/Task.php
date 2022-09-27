<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "remark",
        "date",
        "category",
        "userId",
        "status"
    ];

    protected $casts = [
        "integer" => "userId",
        "integer" => "status"
    ];
}
