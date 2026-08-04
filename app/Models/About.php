<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
    'name',
    'birthday',
    'email',
    'address',
    'postal_code',
    'description',
    'telp',
    'file',
    'is_active',
    'linkedin',
    'porto',
    'github',
    ];

    protected $casts = [
    'birthday' => 'date',
];
}
