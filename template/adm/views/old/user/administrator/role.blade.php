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
 * Administrator roles
 */
?>
@extends('inc.master')
@section('content')
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-list"></i>{{ $page or '' }}
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('manager.user.administrator') }}">Administrators</a>
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
          <label>Name: <span class="required">*</span></label>
          {{ Form::text('manager_name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label class="ckbox">
            {{ Form::checkbox('is_admin', null) }}<span>Super Administrator</span>
          </label>
        </div>
        <div class="panel-group" id="roles">
        @foreach ( $perm as $permissions )
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#roles" href="#collapseOne2">
                  {{ $permissions['title'] }}
                </a>
              </h4>
            </div>
            <div aria-expanded="false" id="collapseOne2" class="panel-collapse collapse">
              <div class="panel-body">
              @foreach ($permissions['value'] as $key => $permission)
                <div class="form-group">
                  <label class="ckbox">
                    {{ Form::checkbox('permissions[]', $key) }}<span>{{ $permission }}</span>
                  </label>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        @endforeach
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
          <th>name</th>
          <th>is admin</th>
        </tr>
      </thead>
      <tbody>
      @if ( isset($list) )
        @forelse ( $list as $data )
        <tr>
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->id }}"></td>
          <td>
            <a href="{{ Request::url() }}?edit={{ $data->id }}" title="Edit {{ $data->manager_name }}"><strong>{{ $data->manager_name }}</strong></a>
          </td>
          <td>
            @if ( $data->is_admin )
            Yes
            @else
            No
            @endif
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