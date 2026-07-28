<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'sub_content',
        'content',
        'is_active',
        'author',
        'date',
        'photo',
    ];
}
