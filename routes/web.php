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
Route::get('table', function (){
    return view('panel2.partials.tables-basic');
});

Route::prefix('profile')->group(function(){
    Route::prefix('post')->namespace('post')->group(function(){
        Route::get('list', 'PostController@getPosts')->name('getPosts');
        Route::get('edit/{post}', 'PostController@getPost')->name('getPost');
        Route::get('add', 'PostController@getPostPost')->name('addPost');

        Route::post('', 'PostController@postPost')->name('postPost');
        Route::patch('', 'PostController@patchPost')->name('patchPost');
        Route::delete('', 'PostController@deletePost')->name('deletePost');

    });
});
