<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 28/02/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Login page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Hoiyen <hoiyen.2000@gmail.com>">

  <title>Administrator Login</title>

  <!-- FONTS -->
  {{ Html::style('public/manager/assets/css/font-awesome.min.css') }}
  {{ Html::style('public/manager/assets/css/font.css') }}

  <!-- CORE -->
  {{ Html::style('public/manager/assets/css/style.css') }}
  {{ Html::style('public/manager/assets/css/custom.css') }}
  {{ Html::script('public/manager/assets/js/modernizr.js') }}
</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
      <h1>Honako</h1>
      <h4 class="panel-title">Administrator Login</h4>
    </div>
    <div class="panel-body">
      @if ( count($errors) > 0 )
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
      </div>
      @endif
      @if ( session('message') )
      <div class="alert alert-info">
        {{ session('message') }}
      </div>
      @endif
      {{ Form::open([ 'route' => 'manager.login' ]) }}
      <div class="form-group mb10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
          {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
        </div>
      </div>
      <div class="form-group nomargin">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
          {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
        </div>
      </div>
      <hr class="invisible">
      <div class="form-group">
        <button class="btn btn-success btn-quirk btn-block">Sign In</button>
      </div>
      {{ Form::close() }}
      <hr class="invisible">
      <center>{!! FOOTPRINT !!}</center>
    </div>
  </div><!-- panel -->
  {{ Html::script('public/manager/assets/js/jquery-2.1.4.min.js') }}
  <script type="text/javascript">
  $(document).ready(function() {
    $('input[name=username]').focus();
  });
  </script>
</body>
</html>