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
        Route::get('list', 'PostController@getList')->name('getList');
        Route::get('list/{post}', 'PostController@getLists')->name('getLists');
        Route::get('add', 'PostController@getAdd')->name('getAdd');

        Route::post('', 'PostController@postPost')->name('postPost');
        Route::delete('', 'PostController@deletePost')->name('deletePost');

    });
});
