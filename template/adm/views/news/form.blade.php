<?php
$attr = [
  'route' => 'news.save',
  'files' => true
];
?>
@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::model($form, $attr) }}
{{ Form::hidden('blog_id', $form->blog_id) }}
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
      <label>Title: </label>
      {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>

    <div class="form-group">
      <label>Content: </label>
      {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
      {!! redactor('description') !!}
    </div>

    <div class="form-group">
      <label>Short description: </label>
      {{ Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => 4]) }}
      <p class="help-block">Short description will be shows at news list / home</p>
    </div>

    <div class="form-group">
      <label>Tags: </label>
      <select name="tags[]" class="form-control select-tags" style="width: 100%" multiple="multiple">
        @if (count($form->tags) > 0)
          @foreach($form->tags as $tags)
          <option value="{{$tags}}" selected="selected">{{$tags}}</option>
          @endforeach
        @endif
      </select>
    </div>        

    <div class="form-group">
      <label>Status: </label>
      {{ Form::select('status', ['draft' => 'Draft', 'published' => 'Published'], $form->status, ['class' => 'form-control', 'style' => 'width: 100%']) }}
    </div>    

  </div>

  <div class="col-md-3">
    
    <div class="panel">
      <div class="panel-heading">
        <h4 class="panel-title">Image</h4>
      </div>
      <div class="panel-body">
        @if (!empty($form->image))
        <img class="img-responsive mb15 preview" src="{{ url('uploads/blog') . '/' . $form->image }}">
        @else
        <img class="img-responsive mb15 preview">
        @endif
        {{ Form::file('image', ['id' => 'image']) }}
      </div>
    </div>

  </div>
</div>
{{ Form::close() }}
<script type="text/javascript">

  // Show image preview
  $('#image').change(function(event) {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });
</script>
@endsection