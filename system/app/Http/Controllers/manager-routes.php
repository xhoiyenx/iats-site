<?php
# System install
Route::get('install', 'SystemController@install');

# ADMIN Login
Route::any('login', 'AuthController@login')->name('login');

# ADMIN logout
Route::get('logout', 'AuthController@logout')->name('logout');

# MANAGER
#####################################
# 1. Manager list
# 2. Manager create
# 3. Manager update
# 4. Manager delete
Route::group(['prefix' => 'admin', 'as' => 'manager::'], function() {
  Route::any('/{id?}', 'ManagerController@index')->name('index');
});

# POST
#####################################
# 1. Post list
# 2. Post create
# 3. Post update
# 4. Post delete
Route::group(['prefix' => 'post', 'as' => 'post::'], function() {
  Route::any('/', 'Post\PostController@index')->name('index');
  Route::get('create', 'Post\PostController@create')->name('create');
  Route::get('{post}/update', 'Post\PostController@update')->name('update');
  Route::get('{post}/delete', 'Post\PostController@delete')->name('delete');
  Route::post('save', 'Post\PostController@save')->name('save');
});

# MEMBER
#####################################
# 1. Member list
# 2. Member create # No creating member
# 3. Member update
# 4. Member soft-delete
Route::group(['prefix' => 'member', 'as' => 'member::'], function() {
  Route::any('/', 'MemberController@index')->name('index');
  Route::get('{member}/update', 'MemberController@update')->name('update');
  Route::get('{member}/delete', 'MemberController@delete')->name('delete');
  Route::post('save', 'MemberController@save')->name('save');
});


# CATALOG
#####################################
Route::group(['prefix' => 'catalog', 'as' => 'catalog.'], function() {

  # COLOR
  Route::get('article', 'Catalog\ArticleController@index')->name('article');

});
