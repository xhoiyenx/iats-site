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
{{ Form::model($form->toArray(), ['route' => 'manager.users.save']) }}
{{ Form::hidden('id', $form->id)}}
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-gift"></i>{{ $page }}
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
    <a href="{{ route('manager.users') }}" class="btn btn-primary btn-quirk">Cancel</a>
  </div>  
</h1>

@include('inc.messages')

<div class="panel panel-inverse">
  <div class="panel-body">

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Username</label>
          {{ Form::text('username', null, ['class' => 'form-control']) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Email Address</label>
          {{ Form::text('usermail', null, ['class' => 'form-control']) }}
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Password</label>
          {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Confirm Password</label>
          {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Status</label>
          {{ Form::select('status', $status, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Role</label>
          {{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
        </div>
      </div>
    </div>

    
  </div>
</div>

<div class="panel panel-inverse">
  <div class="panel-heading">
    <h3 class="panel-title">Information</h3>
  </div>
  <div class="panel-body form-horizontal form-set">

    <div class="form-group">
      <label class="col-md-3 control-label">Fullname</label>
      <div class="col-md-9">
        {{ Form::text('general[fullname]', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Company</label>
      <div class="col-md-9">
        {{ Form::text('general[company]', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Address</label>
      <div class="col-md-9">
        {{ Form::textarea('general[address]', null, ['class' => 'form-control', 'rows' => 3]) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Region</label>
      <div class="col-md-9">
        {{ Form::text('general[region]', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">City</label>
      <div class="col-md-9">
        {{ Form::text('general[city]', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Phone Number</label>
      <div class="col-md-9">
        {{ Form::text('general[phone]', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Mobile Number</label>
      <div class="col-md-9">
        {{ Form::text('general[mobile]', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label">Fax Number</label>
      <div class="col-md-9">
        {{ Form::text('general[fax]', null, ['class' => 'form-control']) }}
      </div>
    </div>    
    
  </div>
</div>



{{ Form::close() }}
@endsection