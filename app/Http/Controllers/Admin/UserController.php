<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        //return "Halo, kami sedang belajar laravel"
        $users = User::with('role')->get();
        $title = "User Table";
        return view('admin.user', compact('title', 'users'));
    }

    // public function simpan(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'address' => 'required'
    //     ]);
    //     User::create($request->all());
    //     return redirect()->route('user')->with('success', 'User created successfulyl');
    // }

    public function update(Request $request, $id) {

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role
        ]);
        return redirect()->route('user')->with('success', 'User updated successfully');
    }

    public function hapus($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
