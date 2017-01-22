@extends('inc.master')
@section('title', $page)
@section('content')
@include('inc.toolbar', ['_add_new' => route('manager.form'), '_ajax' => true])
<div class="row">
  <div class="col-md-12">
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
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->id }}"></td>
          <td>
            <a href="{{ route('manager.form', $data->id) }}" class="btn-form">{{ $data->username }}</a>
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
    @if ( isset($list) )
    {!! $list->links() !!}
    @endif
  </div>
</div>
@endsection