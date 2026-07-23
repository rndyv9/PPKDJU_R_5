<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        // return "Halo kami sedang belajar laravel";
        return view('admin.index');
    }
}
