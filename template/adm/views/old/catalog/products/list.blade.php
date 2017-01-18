<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 1.0.0
 * Last Update: 07/09/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * CMS Page
 */
?>
@extends('inc.master')
@section('content')
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-list"></i>{{ $page or '' }}
  @if (Request::has('sub'))
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('manager.cms.page.create', ['sub' => Request::get('sub')]) }}">Add New</a>
  @else
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('manager.cms.page.create') }}">Add New</a>
  @endif
</h1>
{{ Form::open(['route' => 'manager.cms.page']) }}
<div class="row mb15">
  <div class="col-md-9">

  @if ( isset($breadcrumb) && count($breadcrumb) > 0 )
    <ol class="breadcrumb breadcrumb-quirk nomargin">
      <li><a href="{{ route('manager.cms.page') }}">Pages</a></li>
    @foreach ( $breadcrumb as $i => $crumb )
      @if ( count($breadcrumb) == ($i+1) )
      <li class="active">{{ $crumb->page_name }}</li>
      @else
      <li><a href="{{ route('manager.cms.page', ['sub' => $crumb->id]) }}">{{ $crumb->page_name }}</a></li>
      @endif
    @endforeach
    </ol>
  @endif

  </div>
  <div class="col-md-3">
    <div class="input-group">
      {{ Form::text('search', Request::get('search'), ['class' => 'form-control', 'placeholder' => 'Search for...']) }}
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
    </div><!-- /input-group -->  
  </div>
</div>
@include('inc.messages')
<div class="panel">
<table class="table table-bordered table-primary">
  <thead>
    <tr>
      <th class="cbox"><input type="checkbox" class="checkall"></th>
      <th>title</th>
    </tr>
  </thead>
  <tbody>
  @if ( isset($list) )
    @forelse ( $list as $data )
    <tr>
      <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->id }}"></td>
      <td>
        <a href="{{ route('manager.cms.page.update', ['id' => $data->id]) }}" title="Edit {{ $data->page_name }}"><strong>{{ $data->page_name }}</strong></a>
        <div class="action-block">
          <a href="{{ route('manager.cms.page', ['sub' => $data->id]) }}">subpage</a>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="3">No Data Found</td>
    </tr>
    @endforelse
  @endif
  </tbody>
</table>
</div>
<input type="submit" value="Delete Checked" class="btn btn-small btn-quirk btn-primary delete">
@if ( isset($list) )
{!! $list->links() !!}
@endif
{{ Form::close() }}
@endsection