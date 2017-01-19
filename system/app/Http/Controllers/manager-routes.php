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

# BLOG
#####################################
# 1. Blog list
# 2. Blog create
# 3. Blog update
# 4. Blog delete
Route::group(['prefix' => 'blog', 'as' => 'blog::'], function() {
  Route::any('/', 'BlogController@index')->name('index');
  Route::get('create', 'BlogController@create')->name('create');
  Route::get('{Blog_id}/update', 'BlogController@update')->name('update');
  Route::get('{Blog_id}/delete', 'BlogController@delete')->name('delete');
  Route::post('save', 'BlogController@save')->name('save');
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


# PRODUCT
#####################################
# 1. Product list
# 2. Product create
# 3. Product update
# 4. Product soft-delete