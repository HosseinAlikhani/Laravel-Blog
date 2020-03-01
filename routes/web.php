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
Route::namespace('auth')->group(function(){
    Route::get('login', 'LoginController@view');
});

Route::prefix('profile')->group(function(){
    Route::get('', 'Controller@profile');
    Route::prefix('post')->namespace('post')->group(function(){
        Route::get('list', 'PostController@getPosts')->name('getPosts');
        Route::get('edit/{post}', 'PostController@getPost')->name('getPost');
        Route::get('add', 'PostController@getPostPost')->name('addPost');

        Route::post('', 'PostController@postPost')->name('postPost');
        Route::patch('', 'PostController@patchPost')->name('patchPost');
        Route::delete('', 'PostController@deletePost')->name('deletePost');

    });
    Route::prefix('users')->namespace('user')->group(function(){
        Route::get('', 'UserController@getUsers');
        Route::get('{user}', 'UserController@getUser');
    });
    Route::namespace('role')->group(function() {
        Route::prefix('role')->group(function(){
            Route::get('list', 'RoleController@getRoles')->name('getRoles');
            Route::get('edit/{role}', 'RoleController@getRole')->name('getRole');
            Route::get('add', 'RoleController@getPostRole')->name('getPostRole');
            Route::post('', 'RoleController@postRole')->name('postRole');
            Route::patch('', 'RoleController@patchRole')->name('patchRole');
            Route::delete('', 'RoleController@deleteRole')->name('deleteRole');
        });
        Route::prefix('permission')->group(function(){
            Route::get('list', 'PermissionController@getPermissions')->name('getPermissions');
            Route::get('edit/{permission}', 'PermissionController@getPermission')->name('getPermission');
            Route::get('add', 'PermissionController@getPostPermission')->name('getPostPermission');
            Route::post('', 'PermissionController@postPermission')->name('postPermission');
            Route::patch('', 'PermissionController@patchPermission')->name('patchPermission');
            Route::delete('', 'PermissionController@deletePermission')->name('deletePermission');
        });
    });
});
