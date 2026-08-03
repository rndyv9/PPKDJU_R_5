<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register() {
        return view('admin.register');
    }

    public function actionRegister(Request $request) {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3',
        ]);
        $emailExist = User::where('email', $request->input('email'))->exists();
        if ($emailExist) {
            return redirect()->back()->withErrors(['email' => 'Email already exist']);
        } else {
            $user = new User();
            $user->name = $request->input('fname') . ' ' . $request->input('lname');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            //$user->role_id = '1'; /Either set it here or set the default at mysql
            $user->save();
            return redirect()->route('login')->with('success', 'Registration successful. Please log in');
        }
    }
}
