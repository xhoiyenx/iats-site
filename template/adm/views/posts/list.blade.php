@extends('inc.master')
@section('content')
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-list"></i>{{ $page or '' }}
  <a class="btn btn-primary btn-quirk pull-right" href="{{ route('post::create') }}">Add New</a>
</h1>
{{ Form::open(['route' => 'post::index']) }}
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
  </tbody>
</table>
</div>
<input type="submit" value="Delete Checked" class="btn btn-small btn-quirk btn-primary delete">
@if ( isset($list) )
{!! $list->links() !!}
@endif
{{ Form::close() }}
@endsection