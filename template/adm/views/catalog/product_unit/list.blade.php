@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::open(['route' => ['catalog.product.unit', $product->product_id]]) }}
@include('inc.messages')
@include('inc.toolbar', ['_add_new' => route('catalog.product.unit.form', $product->product_id), '_ajax' => true])
<div class="row">
  <div class="col-md-12">
    <div class="panel">
    <table class="table table-bordered table-primary">
      <thead>
        <tr>
          <th class="cbox"><input type="checkbox" class="checkall"></th>
          <th>code</th>
          <th>size</th>
        </tr>
      </thead>
      <tbody>
      @if ( isset($list) )
        @forelse ( $list as $data )
        <tr>
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->unit_id }}"></td>
          <td>
            <a href="{{ route('catalog.product.unit.form', ['product' => $data->product_id, 'product_unit' => $data->unit_id]) }}" class="btn-form">{{ $data->code }}</a>
          </td>
          <td>
            {{ $data->unit }}
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