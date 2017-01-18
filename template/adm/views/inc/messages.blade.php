<?php
if ( isset($type) ) {
  $errors = $errors->$type;
}
?>
@if ( count($errors) > 0 )
<div class="alert alert-danger">
  @foreach ($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
</div>
@endif
@if ( session('message') )
<div class="alert alert-info">
  {{ session('message') }}
</div>
@endif