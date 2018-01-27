<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function() {
   Route::get('/posts/unique', 'PostController@apiCheckUnique')->name('api.posts.unique');
   Route::get('/comments/store', 'Api\V1\CommentController@store')->name('api.comments.store');
});
Route::get('/comments', 'Api\V1\CommentController@index')->name('api.comments');
