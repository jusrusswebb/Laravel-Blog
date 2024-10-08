<?php

use App\Http\Controllers\ProfileController; 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\DashboardController;

use App\Post; 

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

Route::get('/', function () {
    $posts = \App\Post::latest()->get();
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::resource('posts', 'PostController');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('posts/{post}/comments', 'CommentController@storeComment')->name('comments.storeComment');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

});