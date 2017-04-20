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
      <label class="col-sm-4 control-label">Unit Type</label>
      <div class="col-sm-8">
        {{ Form::text('unit_type', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Featured</label>
      <div class="col-sm-8">
        {{ Form::select('featured', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control', 'style' => 'width:100%']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Short Description</label>
      <div class="col-sm-8">
        {{ Form::textarea('short_description', null, ['class' => 'form-control', 'row' => 3]) }}
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-4 control-label">Description</label>
      <div class="col-sm-8">
        {{ Form::textarea('description', null, ['class' => 'form-control', 'row' => 6]) }}
      </div>
    </div>

    <hr>

    <div class="form-group">
      <label class="col-sm-4 control-label">Brand</label>
      <div class="col-sm-8">
        {{ Form::select('brand_id', $brands, null, ['class' => 'form-control', 'style' => 'width:100%']) }}
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