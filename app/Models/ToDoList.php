<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'remark',
        'date',
        'category',
        'userId',
        'status'
    ];

    protected $casts = [
        
        'date' => 'date',
        'integer' => 'category',
        'integer' => 'userId',
        'integer' => 'status'
    ];

}
