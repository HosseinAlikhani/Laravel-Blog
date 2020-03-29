<?php
Route::prefix('')->group(function(){
    Route::get('blog', 'BlogController@blog')->name('blog');
    Route::get('post/{id}', 'BlogController@single')->name('post');
    Route::get('about', 'BlogController@about')->name('about');
    Route::get('contact', 'BlogController@contact')->name('contact');
    Route::get('work', 'BlogController@work')->name('work');
    Route::get('home', 'BlogController@home')->name('home');
});

Route::get('single', function (){
    return view('blog.single');
});
