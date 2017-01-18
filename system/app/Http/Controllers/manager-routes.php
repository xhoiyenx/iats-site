<?php
# System install
Route::get('install', 'SystemController@index');

# ADMIN Login
Route::any('login', 'AuthController@login')->name('login');

# ADMIN logout
Route::get('logout')->name('logout');

# BLOG
#####################################
# 1. Blog list
# 2. Blog create
# 3. Blog update
# 4. Blog delete

# MEMBER
#####################################
# 1. Member list
# 2. Member create
# 3. Member update
# 4. Member soft-delete

# PRODUCT
#####################################
# 1. Product list
# 2. Product create
# 3. Product update
# 4. Product soft-delete