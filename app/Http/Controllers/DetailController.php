<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id) {
        $blog = Blog::findOrFail($id);
        return view('home.detail', compact('blog'));
    }
}
