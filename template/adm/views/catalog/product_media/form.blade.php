<?php
$attr = [
  'route' => ['catalog.product.media.form', $form->product_id, $form->media_id],
  'class' => 'form-horizontal',
  'files' => true
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
      <label class="col-sm-4 control-label">Sort</label>
      <div class="col-sm-8">
        {{ Form::text('sort_order', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Media type</label>
      <div class="col-sm-8">
        {{ Form::select('type', ['image' => 'Image', 'video' => 'Video'], null, ['class' => 'form-control type', 'style' => 'width:100%']) }}
      </div>
    </div>

    <div class="form-group type-image">
      <label class="col-sm-4 control-label">File</label>
      <div class="col-sm-8">
        {{ Form::file('image', ['id' => 'image']) }}
      </div>
    </div>

    <div class="form-group type-video">
      <label class="col-sm-4 control-label">Video code</label>
      <div class="col-sm-8">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'video']) }}
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-4 control-label">Preview</label>
      <div class="col-sm-8 preview">
      @if ($form->exists)
        @if ($form->type == 'image')
        <img src="{{ $form->path }}" class="img-responsive">
        @else
        <div class="youtube"><iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $form->name }}" frameborder="0"></iframe></div>
        @endif
      @endif
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

  // Show image preview
  $('#image').change(function(event) {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.preview').html('<img src="'+ e.target.result +'" class="img-responsive">');
      }
      reader.readAsDataURL(this.files[0]);
    }
  });

  $('#video').on('paste', function(event) {
    setTimeout(function() {
      var $video = $('#video').val();
      if ($video != '') {
        $('.preview').html('<div class="youtube"><iframe width="560" height="315" src="https://www.youtube.com/embed/'+ $video +'" frameborder="0"></iframe></div>');
      }
    }, 500);
  });

  // Hide or show video / image column depends on selected media type
  var $type = $('.type').val();
  if ($type == 'image') {
    $('.type-video').hide();
  }
  else {
    $('.type-image').hide();
  }

  $('.type').change(function(event) {
    if ($(this).val() == 'image') {
      $('.type-image').show();
      $('.type-video').hide();
    }
    else {
      $('.type-image').hide();
      $('.type-video').show();
    }
  });

});
</script>