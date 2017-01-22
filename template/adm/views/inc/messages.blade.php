<?php
if ( isset($type) ) {
  $errors = $errors->$type;
}
?>
@if ( count($errors) > 0 && isset($errors) )
<div class="alert alert-danger">
  @foreach ($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
</div>
@endif
@if ( isset($infos) AND count($infos) > 0 )
<div class="alert alert-info">
  @foreach ($infos->all() as $info)
  <p>{{ $info }}</p>
  @endforeach
</div>
@endif
@if ( session('message') )
<div class="alert alert-info">
  {{ session('message') }}
</div>
@endif