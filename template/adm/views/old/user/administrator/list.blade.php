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
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('manager.user.administrator.roles') }}">Administrator Roles</a>
</h1>
@include('inc.messages')
<div class="row">
  <div class="col-md-4">
    {{ Form::model( $form, [ 'url' => Request::url() ] ) }}
    {{ Form::hidden( 'edit', $form->id ) }}
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Add new</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label>Username: <span class="required">*</span></label>
          {{ Form::text('username', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label>Email Address: <span class="required">*</span></label>
          {{ Form::text('usermail', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label>Password: </label>
          {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label>Confirm Password: </label>
          {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label>Role: </label>
          {{ Form::select('manager_role_id', $role, null, ['class' => 'form-control']) }}
        </div>
        <button type="submit" name="save" value="1" class="btn btn-success btn-quirk">Save</button>
        <a class="btn btn-default btn-quirk pull-right" href="{{ Request::url() }}">Cancel</a>
      </div>
    </div>
    {{ Form::close() }}    
  </div>

  <div class="col-md-8">

    {{ Form::open( [ 'url' => Request::url() ] ) }}
    <div class="panel">
    <table class="table table-bordered table-primary">
      <thead>
        <tr>
          <th class="cbox"><input type="checkbox" class="checkall"></th>
          <th>e-mail</th>
          <th>username</th>
          <th>role</th>
        </tr>
      </thead>
      <tbody>
      @if ( isset($list) )
        @forelse ( $list as $data )
        <tr>
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->id }}"></td>
          <td>
            <a href="{{ Request::url() }}?edit={{ $data->id }}" title="Edit {{ $data->usermail }}"><strong>{{ $data->usermail }}</strong></a>
          </td>
          <td>
            {{ $data->username }}
          </td>
          <td>
            {{ $data->role->manager_name }}
          </td>      
        </tr>
        @empty
        <tr>
          <td colspan="3">No Data Found</td>
        </tr>
        @endforelse
      @else
        <tr>
          <td colspan="3">No Data Found</td>
        </tr>
      @endif
      </tbody>
    </table>
    </div>
    <input type="submit" value="Delete Checked" class="btn btn-small btn-quirk btn-primary delete">
    @if ( isset($list) )
    {!! $list->links() !!}
    @endif
    {{ Form::close() }}

  </div>
</div>

@endsection