<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index($id) {
        return view('article', [
            'article' => Article::where('id', $id)->first(),
        ]);
    }

    function category($id) {
        $articles = Article::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return view('articles', [
            'articles' => $articles,
            'message' => $articles[0]->category->name.' Category'
        ]);
    }

    function account() {
        $articles = Article::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('articles', [
            'articles' => $articles,
            'message' => 'My Articles'
        ]);
    }

    public function newArticleForm() {
        return view('new-article');
    }

    public function addArticle(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'categoryId' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'description' => 'required'
        ]);

        $uniqueId = uniqid();
        $filename = '/img/article/'.$uniqueId.'.'.$request->file('image')->extension();

        Article::create([
            'title' => $request->title,
            'category_id' => $request->categoryId,
            'image' => $filename,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);

        $file = $request->file('image');
        $file->move('img/article', $uniqueId.'.'.$request->file('image')->extension());

        return back()->with('message', 'success');
    }

    public function deleteArticle(Request $request) {
        $request->validate([
            'articleId' => 'required'
        ]);

        $article = Article::where('id', $request->articleId)->first();

        if($article->image != '/img/article/1.jpg' && $article->image != '/img/article/2.jpg' && $article->image != '/img/article/3.jpg' && $article->image != '/img/article/4.jpg' && $article->image != '/img/article/5.jpg') 
            File::delete(substr($article->image, 1));
        
        $article->delete();

        return back();
    }
}
