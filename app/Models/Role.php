<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //use HasFactory;
    protected $table = 'roles'; //Digunakan jika nama tabel berbeda
    protected $fillable = [
        'name'
    ];
}
