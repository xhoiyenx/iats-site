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
 * CMS Menus page
 */
?>
@extends('inc.master')
@section('content')
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-list"></i>{{ $page or '' }}
  @if (Request::has('sub'))
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('manager.cms.menu.create', ['sub' => Request::get('sub')]) }}">Add New</a>
  @else
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('manager.cms.menu.create') }}">Add New</a>
  @endif
</h1>
{{ Form::open(['route' => 'manager.cms.menu']) }}
<div class="row mb15">
  <div class="col-md-9">

  @if ( count($breadcrumb) > 0 )
    <ol class="breadcrumb breadcrumb-quirk nomargin">
      <li><a href="{{ route('manager.cms.menu') }}">Menu</a></li>
    @foreach ( $breadcrumb as $i => $crumb )
      @if ( count($breadcrumb) == ($i+1) )
      <li class="active">{{ $crumb->menu_name }}</li>
      @else
      <li><a href="{{ route('manager.cms.menu', ['sub' => $crumb->id]) }}">{{ $crumb->menu_name }}</a></li>
      @endif
    @endforeach
    </ol>
  @endif

  </div>
  <div class="col-md-3">
    {{ Form::select('menu', config('cms.menus'), Request::get('menu'), ['class' => 'form-control']) }}
  </div>
</div>
@include('inc.messages')
<div class="panel">
<table class="table table-bordered table-primary">
  <thead>
    <tr>
      <th class="cbox"><input type="checkbox" class="checkall"></th>
      <th>name</th>
    </tr>
  </thead>
  <tbody>
    @forelse ( $list as $data )
    <tr>
      <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->id }}"></td>
      <td>
        <a href="{{ route('manager.cms.menu.update', ['id' => $data->id]) }}" title="Edit {{ $data->menu_name }}"><strong>{{ $data->menu_name }}</strong></a>
        <div class="action-block">
          <a href="{{ route('manager.cms.menu', ['sub' => $data->id]) }}">submenu</a>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="3">No Data Found</td>
    </tr>
    @endforelse
  </tbody>
</table>
</div>
<input type="submit" value="Delete Checked" class="btn btn-small btn-quirk btn-primary delete">
{!! $list->links() !!}
@endsection