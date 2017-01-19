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
 * Page update form
 */
?>
@extends('inc.master')
@section('content')
{{ Form::model($form, ['route' => 'member::save']) }}
{{ Form::hidden('id', $form->id) }}
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-file-o"></i>{{ $page or '' }}
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
    <a href="{{ route('member::index') }}" class="btn btn-primary btn-quirk">Exit</a>
  </div>  
</h1>
@include('inc.messages')
<div class="row">
  <div class="col-md-8">

    <div class="form-group">
      <label>Username: </label>
      {{ Form::text('page_name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>E-mail address: </label>
      {{ Form::text('page_name', null, ['class' => 'form-control']) }}
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Change password: </label>
          {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Confirm password: </label>
          {{ Form::password('confirm_password', ['class' => 'form-control']) }}
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Fullname: </label>
      {{ Form::text('page_name', null, ['class' => 'form-control']) }}
    </div>    

    <div class="form-group">
      <label>Mobile phone: </label>
      {{ Form::text('page_name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>Address: </label>
      {{ Form::text('page_name', null, ['class' => 'form-control']) }}
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>City: </label>
          {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Status: </label>
          {{ Form::password('confirm_password', ['class' => 'form-control']) }}
        </div>
      </div>
    </div>

    <div class="form-group">
      <label>Bio: </label>
      {{ Form::text('page_name', null, ['class' => 'form-control']) }}
    </div>    

  </div>
</div>
{{ Form::close() }}
@endsection