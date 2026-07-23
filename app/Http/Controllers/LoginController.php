<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function actionLogin(Request $request) {
        // return $request;
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3']
        ]);

        //Auth:attempt: Cek email dan password betul
        if(Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email' => 'email atau password salah!'
        ])->onlyInput('email');
    }
}
