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

  # USER online
  Route::get('online', 'UserController@online');

  # PROFILE
  ############################################
  # USER profile
  Route::get('profile', 'UserProfileController@profile');

  # USER update profile
  Route::post('profile/update', 'UserProfileController@update');

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
  'prefix' => 'post'
];
Route::group($group, function ($router) {

  # BLOG list
  Route::get('/', 'PostController@index');

  # BLOG like
  Route::get('like/{post}', 'PostController@like');

  # BLOG send
  Route::post('post', 'PostController@post');

  # POST Detail
  Route::get('detail/{post}', 'PostController@postDetail');

  # COMMENTS
  ############################################
  # COMMENT list of post
  Route::get('comments/{post}', 'PostController@listComments');

  # COMMENT send
  Route::post('comments/send', 'PostController@sendComments');

  # COMMENT details of post
  Route::get('comments/detail/{post}', 'PostCommentController@getDetail');
});

/**
 * API for CHAT
 */
$group = [
  'prefix' => 'chat'
];
Route::group($group, function ($router) {

  # CHAT list
  Route::get('/', 'ChatController@index');

  # CHAT send
  Route::post('send', 'ChatController@send');

});

/**
 * API for PRODUCT
 */
$group = [
  'prefix' => 'product'
];
Route::group($group, function($router) {

  Route::get('list/{type}', 'ProductController@listByType');
  Route::get('detail/{product_id}', 'ProductController@detail');
  Route::get('info', 'ProductController@info');
  
  Route::get('color', 'ProductController@color');
  Route::get('units', 'ProductController@units');

});


/**
 * Cart
 */
Route::get('cart', 'OrderController@cart');
Route::get('cart/delete/{cart_id}', 'OrderController@deleteCart');
Route::post('cart/create', 'OrderController@create');

/**
 * Payments
 */
Route::post('checkout/{type}', 'PaymentController@checkout');

/**
 * API for search
 */
Route::get('search/{query}', 'SearchController@index');