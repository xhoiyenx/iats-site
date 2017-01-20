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
</h1>
{{ Form::open(['route' => 'member::index']) }}
<!--
<div class="row mb15">
  <div class="col-md-3">
    <div class="input-group">
      {{ Form::text('search', Request::get('search'), ['class' => 'form-control', 'placeholder' => 'Search for...']) }}
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
    </div>
  </div>
</div>
-->
@include('inc.messages')
<div class="panel">
<table class="table table-bordered table-primary">
  <thead>
    <tr>
      <th class="cbox"><input type="checkbox" class="checkall"></th>
      <th>username</th>
    </tr>
  </thead>
  <tbody>
  @if ( isset($list) )
    @forelse ( $list as $data )
    <tr>
      <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->member_id }}"></td>
      <td>
        <a href="{{ route('member::update', $data->member_id) }}" title="Edit {{ $data->username }}"><strong>{{ $data->username }}</strong></a>
        <div class="action-block">
          
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