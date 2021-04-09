<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin', [
            'users' => User::all()
        ]);
    }

    public function deleteUser(Request $request) {
        $request->validate([
            'userId' => 'required|numeric'
        ]);

        User::where('id', $request->userId)->delete();

        return back()->with('message', 'success');
    }
}
