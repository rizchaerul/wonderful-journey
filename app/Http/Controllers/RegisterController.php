<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'password' => 'required|confirmed',
            'email' => 'required|unique:users,email|email',
            'name' => 'required',
            'phone' => 'required|numeric'
        ]);

        // echo $request->phone;

        $user = User::create([
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        Auth::attempt($request->only('email', 'password'));
        return redirect('/');
    }
}
