@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::open(['route' => 'catalog.product']) }}
@include('inc.toolbar', ['_add_new' => route('catalog.product.form'), '_ajax' => true])
<div class="row">
  <div class="col-md-12">
    <div class="panel">
    <table class="table table-bordered table-primary">
      <thead>
        <tr>
          <th class="cbox"><input type="checkbox" class="checkall"></th>
          <th>id</th>
          <th width="15%">unit type</th>
          <th width="15%">brand</th>
        </tr>
      </thead>
      <tbody>
      @if ( isset($list) )
        @forelse ( $list as $data )
        <tr>
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->product_id }}"></td>
          <td>
            <a href="{{ route('catalog.product.form', $data->product_id) }}" class="btn-form">{{ $data->product_id }}</a>
            <div class="action-block">
              <a href="{{ route('catalog.product.media', $data->product_id) }}">media</a>
              | <a href="{{ route('catalog.product.detail', $data->product_id) }}">sub-product</a>
            </div>
          </td>
          <td>
            {{ $data->unit_type }}
          </td>
          <td>
            {{ $data->brand->name }}
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="10">No Data Found</td>
        </tr>
        @endforelse
      @else
        <tr>
          <td colspan="10">No Data Found</td>
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