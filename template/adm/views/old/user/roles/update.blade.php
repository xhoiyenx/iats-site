<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 09/03/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Products page
 */
?>
@extends('inc.master')
@section('content')
{{ Form::model($form, ['route' => 'manager.roles.save']) }}
{{ Form::hidden('id', $form->id)}}
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-gift"></i>{{ $page }}
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
    <a href="{{ route('manager.roles') }}" class="btn btn-primary btn-quirk">Cancel</a>
  </div>  
</h1>

@include('inc.messages')

<div class="panel panel-inverse">
  <div class="panel-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group nomargin">
          {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
      </div>

    </div>
    
  </div>
</div>

<div class="panel panel-inverse">
  <ul class="panel-options">
    <li>
      <label class="ckbox">
        <input class="checkall" type="checkbox"><span>Check All</span>
      </label>
    </li>
  </ul>
  <div class="panel-heading">
    <h3 class="panel-title">Permissions</h3>
  </div>
  <div class="panel-body form-horizontal form-set wh5">

    <?php $permissions = $form->permissions_list()->toArray() ?>
    <div class="form-group">
      <label class="col-md-3 control-label"><h5>CATALOG</h5></label>
      <div class="col-md-9">
        <div class="col-md-4">
          <h5>Attributes</h5>
          {{ cbPermissions('catalog_attributes', $permissions) }}
        </div>
        <div class="col-md-4">
          <h5>Categories</h5>
          {{ cbPermissions('catalog_categories', $permissions) }}
        </div>
        <div class="col-md-4">
          <h5>Products</h5>
          {{ cbPermissions('catalog_products', $permissions) }}
        </div>
      </div>
    </div>
    
  </div>
</div>

{{ Form::close() }}
@endsection