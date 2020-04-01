<?php

Route::get('blog', 'BlogController@blog')->name('blog');
Route::get('post/{id}', 'BlogController@single')->name('post');
Route::get('about', 'BlogController@about')->name('aboutus');
Route::get('contact', 'BlogController@contact')->name('contactus');
Route::get('work', 'BlogController@work')->name('work');

Route::get('single', function (){
    return view('blog.single');
});
