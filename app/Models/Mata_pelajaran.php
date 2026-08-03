<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mata_pelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelajaran'
    ];
}
