<?php

Route::prefix('profile')->group(function(){
    Route::get('', 'ProfileController@profile');


    Route::prefix('post')->group(function(){
        Route::get('list', 'PostController@getPosts')->name('getPosts');
        Route::get('edit/{post}', 'PostController@getPost')->name('editPost');
        Route::get('add', 'PostController@getPostPost')->name('addPost');
        Route::post('', 'PostController@postPost')->name('postPost');
        Route::post('{post}', 'PostController@patchPost')->name('patchPost');
        Route::delete('', 'PostController@deletePost')->name('deletePost');
    });

    Route::prefix('category')->group(function (){
        Route::get('', 'CategoryController@getCreate')->name('get.create.category');
        Route::get('list', 'CategoryController@getList')->name('get.list.category');
        Route::get('update', 'CategoryController@getUpdate')->name('get.update.category');
        Route::post('', 'CategoryController@postCreate')->name('post.create.category');
    });
});
