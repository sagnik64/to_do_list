<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'status'
    ];

    protected $casts = [
        'integer' => 'status'
    ];
}
