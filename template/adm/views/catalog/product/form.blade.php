<?php
$attr = [
  'route' => ['catalog.product.form', $form->product_id],
  'class' => 'form-horizontal'
];
?>
<div class="ajax-form">
{{ Form::model($form, $attr) }}
  <input type="hidden" name="save" value="1">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Product {{ $form->code or '' }}</h3>
  </div>
  <div class="modal-body">
    @include('inc.messages')
    
    <div class="form-group">
      <label class="col-sm-4 control-label">Code</label>
      <div class="col-sm-8">
        {{ Form::text('code', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Price</label>
      <div class="col-sm-8">
        {{ Form::text('base', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Unit Type</label>
      <div class="col-sm-8">
        {{ Form::text('unit_type', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <hr>

    <div class="form-group">
      <label class="col-sm-4 control-label">Article</label>
      <div class="col-sm-8">
        {{ Form::select('article_id', $articles, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Brand</label>
      <div class="col-sm-8">
        {{ Form::select('brand_id', $brands, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Color</label>
      <div class="col-sm-8">
        {{ Form::select('color_id', $colors, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Type</label>
      <div class="col-sm-8">
        {{ Form::select('type', $types, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Status</label>
      <div class="col-sm-8">
        {{ Form::select('status', $statuses, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
      </div>
    </div>    

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button class="btn btn-primary" name="save" value="1">Save changes</button>
  </div>
{{ Form::close() }}
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('select').select2({
    dropdownParent: $('.modal')
  });
});
</script>