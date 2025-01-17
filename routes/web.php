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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoriesController');
Route::resource('tags', 'TagsController');
Route::resource('posts', 'PostsController');

Route::get('/trashedposts', 'PostsController@indextrashed')->name('trashedPosts');

Route::put('/restorepost/{post}', 'PostsController@restore')->name('restorePosts');
Route::get('/users', 'UsersController@index')->name('users')->middleware(['verifyAdmin', 'auth']);
Route::post('/users/{user}/makeadmin', 'UsersController@makeAdmin')->name('users.makeAdmin')->middleware(['verifyAdmin', 'auth']);