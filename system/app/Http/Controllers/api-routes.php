<?php
Route::get('/', function () {
    
});

/**
 * API for USER
 */
$group = [
  'prefix' => 'user',
];
Route::group($group, function ($router) {

  # ACCOUNT
  ############################################
  # USER login
  Route::get('login', 'UserController@login');

  # USER registration
  Route::post('register', 'UserController@register');

  # USER forgot password
  Route::get('forgot-password', 'UserController@forgotPassword');

  # PROFILE
  ############################################
  # USER profile
  Route::get('profile');

  # USER update profile
  Route::get('profile/update');

  # USER update profile avatar
  Route::get('profile/update-avatar');

  # CARD PAYMENT
  ############################################
  # USER get cards
  Route::get('card');

  # USER get card detail
  Route::get('card/{card_id}');

  # USER card insert
  Route::get('card/insert');

  # USER card insert
  Route::get('card/update/{card_id}');

});

/**
 * API for BLOG
 */
$group = [
  'prefix' => 'blog'
];
Route::group($group, function ($router) {

  # BLOG list
  Route::get('/');

  # BLOG like
  Route::get('like/{blog_id}');

  # BLOG send
  Route::post('post');

  # COMMENTS
  ############################################
  # COMMENT detail
  Route::get('comments/{blog_id}');

  # COMMENT send
  Route::get('comments/send/{blog_id}');

});

/**
 * API for CHAT
 */
$group = [
  'prefix' => 'chat'
];
Route::group($group, function ($router) {

  # CHAT list
  Route::get('/');

  # CHAT send
  Route::get('send');

});

/**
 * API for search
 */
Route::get('search');