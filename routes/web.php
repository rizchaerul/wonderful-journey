<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/admin', function() {
//     return view('admin');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@login')->name('login');
    
    Route::get('/register', 'RegisterController@index');
    Route::post('/register', 'RegisterController@register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'LoginController@logout');

    Route::get('/profile/update', 'UserController@index');
    Route::post('/profile/update', 'UserController@update');
});

Route::group(['middleware' => 'role:user'], function () {
    Route::get('/article/my-article', 'ArticleController@account');
    Route::post('/article/new-article', 'ArticleController@addArticle');

    Route::get('/article/new-article', 'ArticleController@newArticleForm');

    Route::post('/article/delete', 'ArticleController@deleteArticle');
});

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin', 'AdminController@deleteUser');
});

Route::get('/', 'HomeController@index');

Route::get('/article/category/{id}', 'ArticleController@category');
Route::get('/article/{id}', 'ArticleController@index');