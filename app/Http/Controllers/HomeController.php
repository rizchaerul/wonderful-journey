<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('home', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
}
