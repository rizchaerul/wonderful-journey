<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $profile = User::where('id', auth()->user()->id)->first();
        return view('profile', [
            'user' => $profile
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        
        if($request->email != auth()->user()->email) {
            $user = User::where('email', $request->email)->first();

            if($user != null) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'email' => ['Email already exists. Please try with another one']
                 ]);
                 throw $error;
            }
        }

        $user = User::where('id', auth()->user()->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        return back()->with('message', 'success');
    }
}
