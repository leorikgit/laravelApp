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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

////////////////////////////////// ADMIN
Route::group(['middleware'=>'admin'], function (){
    Route::name('admin.')->group(function () {
        Route::resource('admin/users', 'AdminUsersController');
        Route::resource('admin/posts', 'AdminPostsController');
        Route::resource('category', 'AdminCategoryController')->except(['create']);
        Route::resource('admin/comments', 'AdminCommentsController');
        Route::resource('comments/replay', 'CommentsReplayController');
        Route::resource('media', 'AdminMediaController');
    });

    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::delete('/admin/deletePosts', 'AdminPostsController@deletePosts')->name('admin.deletePosts');
});
////////////////////////////////// USERS
Route::group(['middleware'=>'auth'], function(){
    Route::post('/post/comment', 'UserPostCommentsController@store')->name('user.post.comment.store');
    Route::post('/comment/replay', 'UserCommentsReplaysController@store')->name('user.comment.replay.store');
});


////////////////////////////////// EVERYONE
Route::get('/post/{slug}', 'AdminPostsController@post')->name('home.post');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
