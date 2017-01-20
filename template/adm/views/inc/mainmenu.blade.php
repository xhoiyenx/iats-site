<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 05/03/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Manager mainmenu
 */
?>
<ul class="nav nav-pills nav-stacked nav-quirk">
  <li>
    <a href="#"><i class="fa fa-list"></i> <span>Blog</span></a>
  </li>
  <li class="nav-parent">
    <a href="#"><i class="fa fa-tags"></i> <span>Catalog</span></a>
    <ul class="children">
      <li>
        <a href="#">Products</a>
        <a href="#">Article</a>
        <a href="#">Brand</a>
        <a href="#">Color</a>
      </li>
    </ul>
  </li>
  <li class="{!! is_active(['manager::index', 'member::index', 'member::update'], 'active ') !!}nav-parent">
    <a href="#"><i class="fa fa-users"></i> <span>Users</span></a>
    <ul class="children">
      <li class="{!! is_active(['manager::index'], 'active ') !!}">
        <a href="{{ route('manager::index') }}">Administrator</a>
      </li>
      <li class="{!! is_active(['member::index', 'member::update'], 'active ') !!}">
        <a href="{{ route('member::index') }}">Member</a>
      </li>
    </ul>
  </li>
</ul>