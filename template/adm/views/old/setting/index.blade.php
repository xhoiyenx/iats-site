<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 06/03/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Configuration page
 */
$label = 'control-label col-sm-4 col-md-3';
$input = 'col-sm-8 col-md-9';
?>
@extends('inc.master')
@section('content')

{{ Form::model( app('options'), ['class' => 'form-horizontal'] ) }}
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-gears"></i>General Settings
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
  </div>  
</h1>
@include('inc.messages')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-body form-horizontal form-set">
        <div class="form-group">
          {{ Form::label('site_title', 'Site Title', ['class' => $label]) }}
          <div class="{{$input}}">
            {{ Form::text('site_title', null, ['class' => 'form-control']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('site_description', 'Site Description', ['class' => $label]) }}
          <div class="{{$input}}">
            {{ Form::text('site_description', null, ['class' => 'form-control']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('site_copyright', 'Copyright', ['class' => $label]) }}
          <div class="{{$input}}">
            {{ Form::text('site_copyright', null, ['class' => 'form-control']) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}

@endsection