<?php

use App\Http\Controllers\ProfileController; 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController; 
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
    return redirect()->route('posts.index');
});

Auth::routes();

Route::resource('posts', 'PostController');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('posts/{post}/comments', 'CommentController@storeComment')->name('comments.storeComment');

    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

});