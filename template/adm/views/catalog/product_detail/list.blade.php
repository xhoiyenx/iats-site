@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::open(['route' => ['catalog.product.detail', $product->product_id]]) }}
@include('inc.messages')
@include('inc.toolbar', ['_add_new' => route('catalog.product.detail.form', $product->product_id), '_ajax' => true])
<div class="row">
  <div class="col-md-12">
    <div class="panel">
    <table class="table table-bordered table-primary">
      <thead>
        <tr>
          <th class="cbox"><input type="checkbox" class="checkall"></th>
          <th>code</th>
          <th width="15%">brand</th>
          <th width="15%">article</th>
          <th width="15%">color</th>
        </tr>
      </thead>
      <tbody>
      @if ( isset($list) )
        @forelse ( $list as $data )
        <tr>
          <td class="cbox"><input type="checkbox" name="delete[]" value="{{ $data->product_detail_id }}"></td>
          <td>
            <a href="{{ route('catalog.product.detail.form', ['product' => $data->product_id, 'detail' => $data->product_detail_id]) }}" class="btn-form">{{ $data->code }}</a>
            @if ($product->unit_type == 'Sqf' || $product->unit_type == 'Meter')
            <div class="action-block">
              <a href="{{ route('catalog.product.unit', $data->product_detail_id) }}">sizes</a>
            </div>
            @endif
          </td>
          <td>
            {{ $data->product->brand->name }}
          </td>
          <td>
            {{ $data->article->name }}
          </td>
          <td>
            {{ $data->color->name }}
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