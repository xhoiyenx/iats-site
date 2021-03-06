@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::open(['route' => 'catalog.brand']) }}
@include('inc.toolbar', ['_add_new' => route('catalog.brand.form'), '_ajax' => true])
<div class="row">
  <div class="col-md-12">
    <div class="panel">
    <table class="table table-bordered table-primary">
      <thead>
        <tr>
          <th class="cbox"><input type="checkbox" class="checkall"></th>
          <th>name</th>
        </tr>
      </thead>
      <tbody>
      @if ( isset($list) )
        @forelse ( $list as $data )
        <tr>
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->brand_id }}"></td>
          <td>
            <a href="{{ route('catalog.brand.form', $data->brand_id) }}" class="btn-form">{{ $data->name }}</a>
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
{{ Form::close() }}
@endsection