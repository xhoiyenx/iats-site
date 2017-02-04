<?php
# HOMEPAGE
Route::get('/', 'HomeController@index')->name('home');

# BLOG POST
Route::get('blog/{id}', 'BlogController@index')->name('blog');