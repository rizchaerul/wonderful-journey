<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        if(!\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password', 'role'))) {
            return back()->with([
                'status' => 'is-invalid',
                'email' => $request->email
            ]);
        }

        if(auth()->user()->role == 'admin') return redirect('/admin');
        return redirect('/');
    }

    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();

        return redirect('/login');
    }
}
