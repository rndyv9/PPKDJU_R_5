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
        // $credential = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required', 'min:3']
        // ]);

        $credential = $request->only('email', 'password');

        //Auth:attempt: Cek email dan password betul
        if(Auth::attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::user();
            session(['user_id' => $user->id, 'user_name' => $user->name, 'role' => $user->role]);
            return redirect()->intended('admin/dashboard');
        }
        return back()->withErrors([
            'email' => 'email atau password salah!'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

}
