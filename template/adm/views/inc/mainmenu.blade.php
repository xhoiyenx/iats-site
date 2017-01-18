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
  <li{!! is_active('manager.dashboard', ' class="active"') !!}>
    <a href="{{ route('manager.dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
  </li>
</ul>

<h5 class="sidebar-title">CMS</h5>
<ul class="nav nav-pills nav-stacked nav-quirk">
  <li class="{!! is_active(['manager.cms.menu', 'manager.cms.menu.create', 'manager.cms.menu.update'], 'active ') !!}">
    <a href="{{ route('manager.cms.menu') }}"><i class="fa fa-table"></i> <span>Menu</span></a>
  </li>
  <li class="{!! is_active(['manager.cms.page', 'manager.cms.page.create', 'manager.cms.page.update'], 'active ') !!}">
    <a href="{{ route('manager.cms.page') }}"><i class="fa fa-list"></i> <span>Page</span></a>
  </li>
</ul>

<h5 class="sidebar-title">CATALOG</h5>
<ul class="nav nav-pills nav-stacked nav-quirk">
  <li>
    <a href="{{ route('manager.catalog.product') }}">Products</a>
  </li>
  <li class="nav-parent">
    <a href="#">Settings</a>
    <ul class="children">
      <li>
        <a href="#">Categories</a>
      </li>
    </ul>
  </li>
</ul>


<ul class="nav nav-pills nav-stacked nav-quirk">
  <li class="{!! is_active(['manager.user.administrator', 'manager.user.administrator.roles'], 'active ') !!}nav-parent">
    <a href="#"><i class="fa fa-users"></i> <span>Users</span></a>
    <ul class="children">
      <li class="{!! is_active(['manager.user.administrator', 'manager.user.administrator.roles'], 'active ') !!}">
        <a href="{{ route('manager.user.administrator') }}">Administrators</a>
      </li>
    </ul>
  </li>
  <li class="{!! is_active(['manager.configuration'], 'active ') !!}nav-parent">
    <a href="#"><i class="fa fa-gears"></i> <span>Settings</span></a>
    <ul class="children">
      <li>
        <a href="{{ route('manager.configuration', ['type' => 'general']) }}">General</a>
      </li>
    </ul>
  </li>
</ul>