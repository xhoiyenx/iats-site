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
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-user"></i>{{ $page }}
  <a class="btn btn-success btn-quirk pull-right" href="{{ route('manager.users.update') }}">Add New</a>
</h1>
@include('inc.messages')
<div class="panel">
<table class="table table-bordered table-primary table-striped">
  <thead>
    <th>email</th>
    <th>price</th>
    <th width="15%" class="text-center">action</th>
  </thead>
  <tbody>
    @forelse ( $list as $data )
    <tr>
      <td><strong><a href="{{ route('manager.users.update', ['id' => $data->id]) }}">{{ $data->usermail }}</a></strong></td>
      <td></td>
      <td class="text-center">
        <ul class="table-options">
          <li><a href="{{ route('manager.users.update', ['id' => $data->id]) }}" title="Edit"><i class="fa fa-fw fa-pencil"></i></a></li>
          <li><a href="{{ route('manager.users.delete', ['id' => $data->id]) }}" title="Delete"><i class="fa fa-fw fa-trash"></i></a></li>
        </ul>
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
{!! $list->links() !!}
@endsection