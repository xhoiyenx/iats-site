<?php
$attr = [
  'route' => ['manager.form', $form->id],
  'class' => 'form-horizontal'
];
?>
<div class="ajax-form">
{{ Form::model($form, $attr) }}
  <input type="hidden" name="save" value="1">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Administrator</h3>
  </div>
  <div class="modal-body">
    
    @include('inc.messages')
    <div class="form-group">
      <label class="col-sm-4 control-label">Username</label>
      <div class="col-sm-8">
        {{ Form::text('username', null, ['class' => 'form-control']) }}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">E-Mail</label>
      <div class="col-sm-8">
        {{ Form::text('usermail', null, ['class' => 'form-control']) }}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Password</label>
      <div class="col-sm-8">
        {{ Form::password('password', ['class' => 'form-control']) }}
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Confirm Password</label>
      <div class="col-sm-8">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
      </div>
    </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button class="btn btn-primary" name="save" value="1">Save changes</button>
  </div>
{{ Form::close() }}
</div>