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
Route::prefix('profile')->group(function(){
    Route::get('', 'Controller@profile');
    Route::prefix('post')->group(function(){
        Route::get('list', 'PostController@getPosts')->name('getPosts');
        Route::get('edit/{post}', 'PostController@getPost')->name('editPost');
        Route::get('add', 'PostController@getPostPost')->name('addPost');
        Route::post('', 'PostController@postPost')->name('postPost');
        Route::post('{post}', 'PostController@patchPost')->name('patchPost');
        Route::delete('', 'PostController@deletePost')->name('deletePost');
    });
});

Route::prefix('')->group(function(){
    Route::get('blog', 'BlogController@view')->name('blog');
    Route::get('post/{id}', 'BlogController@single')->name('post');
    Route::get('about', 'BlogController@about')->name('about');
    Route::get('contact', 'BlogController@contact')->name('contact');
    Route::get('work', 'BlogController@work')->name('work');
});

Route::prefix('comments')->group(function(){
   Route::get('', 'CommentController@getComments');
   Route::get('{comments}', 'CommentController@getComment');
   Route::post('', 'CommentController@postComments');
   Route::patch('', 'CommentController@patchComments');
   Route::delete('', 'CommentController@deleteComments');
});
