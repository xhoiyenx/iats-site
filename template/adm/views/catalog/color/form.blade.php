@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::model($form, ['route' => 'post::save']) }}
{{ Form::hidden('post_id', $form->post_id) }}
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-file-o"></i>{{ $page or '' }}
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
    <a href="{{ route('post::index') }}" class="btn btn-primary btn-quirk">Exit</a>
  </div>  
</h1>
@include('inc.messages')
<div class="row">
  <div class="col-md-9">

    <div class="form-group">
      <label>Member: </label>
      <p>email@example.com</p>
    </div>

    <hr>

    <div class="form-group">
      <label>Caption: </label>
      <p>email@example.com</p>
    </div>

    <hr>

    <div class="form-group">
      <label>Location: </label>
      <p>email@example.com</p>
    </div>

    <hr>

    <div class="form-group">
      <label>Tags: </label>
      <p><a href="#"><span class="badge">tags</span></a> <a href="#"><span class="badge">tags</span></a> <a href="#"><span class="badge">tags</span></a> <a href="#"><span class="badge">tags</span></a></p>
    </div>

    <hr>    

    <div class="form-group">
      <label>Status: </label>
      {{ Form::select('status', ['active' => 'Active', 'blocked' => 'Blocked'], $form->status, ['class' => 'form-control', 'style' => 'width: 100%']) }}
    </div>    

  </div>

  <div class="col-md-3">
    
    <div class="panel">
      <div class="panel-heading">
        <h4 class="panel-title">Image</h4>
      </div>
      <div class="panel-body">
        <img class="img-responsive" src="{{ $assets . '/images/image.jpg' }}">
      </div>
    </div>

  </div>
</div>
{{ Form::close() }}
@endsection