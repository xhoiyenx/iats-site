<?php
# System install
Route::get('install', 'SystemController@install');

# System upload
Route::any('upload', 'SystemController@upload')->name('upload');

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
Route::group(['prefix' => 'admin', 'as' => 'manager.'], function() {
  Route::any('/', 'User\ManagerController@index')->name('index');
  Route::post('form/{manager?}', 'User\ManagerController@form')->name('form');
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

# BLOG
#####################################
# 1. Blog list
# 2. Blog create
# 3. Blog update
# 4. Blog delete
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
  Route::any('/', 'Blog\BlogController@index')->name('index');
  Route::get('create', 'Blog\BlogController@create')->name('create');
  Route::post('save', 'Blog\BlogController@save')->name('save');
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

  # Article
  Route::any('article', 'Catalog\ArticleController@index')->name('article');
  Route::post('article/form/{article?}', 'Catalog\ArticleController@form')->name('article.form');

  # Brand
  Route::any('brand', 'Catalog\BrandController@index')->name('brand');
  Route::post('brand/form/{brand?}', 'Catalog\BrandController@form')->name('brand.form');

  # Color
  Route::any('color', 'Catalog\ColorController@index')->name('color');
  Route::post('color/form/{color?}', 'Catalog\ColorController@form')->name('color.form');

  # Product
  Route::any('product', 'Catalog\ProductController@index')->name('product');
  Route::post('product/form/{product?}', 'Catalog\ProductController@form')->name('product.form');

  # Product Media
  Route::any('product/{product}/media', 'Catalog\ProductMediaController@index')->name('product.media');
  Route::post('product/{product}/media/form/{product_media?}', 'Catalog\ProductMediaController@form')->name('product.media.form');

  # Product Units
  Route::any('product/{product}/unit', 'Catalog\ProductUnitController@index')->name('product.unit');
  Route::post('product/{product}/unit/form/{product_unit?}', 'Catalog\ProductUnitController@form')->name('product.unit.form');  

});
