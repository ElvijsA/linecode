<?php

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

//Base page routes
Route::get('/', 'PageController@index');
Route::get('home', 'PageController@index')->name('home');
Route::get('about', 'PageController@about')->name('about');
Route::get('contact', 'PageController@contact')->name('contact');

//Authentication routes
Auth::routes();

//User routes
Route::get('profile', 'ProfileController@index')->name('profile')->middleware('auth');

//Dashboard routes
Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author')->group(function() {
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users', 'UserController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
  Route::resource('/posts', 'PostController');
  Route::resource('/categories', 'CategoryController');
  Route::resource('/tags', 'TagController');
  Route::resource('/comments', 'CommentController');
  Route::get('/images', 'ImagesController@index')->name('images.index');
});

//Blog routes
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/show/{slug}', 'BlogController@show')->name('blog.show');
