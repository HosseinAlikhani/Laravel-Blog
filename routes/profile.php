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
        Route::get('add', 'CategoryController@getCreate')->name('get.create.category');
        Route::get('list', 'CategoryController@getList')->name('get.list.category');
        Route::get('update/{id}', 'CategoryController@getUpdate')->name('get.update.category');
        Route::delete('delete', 'CategoryController@getDelete')->name('post.delete.category');
        Route::post('', 'CategoryController@postCategory')->name('post.category');
        Route::post('update', 'CategoryController@patchCategory')->name('patch.category');
    });
    Route::prefix('tag')->group(function (){
       Route::get('add', 'TagController@getCreate')->name('get.create.tag');
       Route::get('list', 'TagController@getList')->name('get.list.tag');
       Route::get('update/{id}', 'TagController@getUpdate')->name('get.update.tag');
       Route::delete('delete', 'TagController@deleteTag')->name('delete.tag');
       Route::post('create', 'TagController@postTag')->name('post.tag');
       Route::post('update', 'TagController@patchTag')->name('patch.tag');
    });
});
