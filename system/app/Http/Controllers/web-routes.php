<?php
# HOMEPAGE
Route::get('/', 'HomeController@index')->name('home');

# BLOG POST
Route::get('articles/{id}', 'BlogController@index')->name('blog');

# NEWS
Route::get('press-release', 'NewsController@home')->name('news');
Route::get('press-release/{id}', 'NewsController@index')->name('news.details');

Route::get('member-list', 'HomeController@members')->name('members');
Route::get('about', 'HomeController@about')->name('about');

# MIDTRANS PAYMENT NOTIFICATION
Route::post('payment/notification', 'PaymentController@notification');