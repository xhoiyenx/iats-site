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

  <title>System Installation</title>

  <!-- FONTS -->
  {{ Html::style('public/manager/assets/css/font-awesome.css') }}
  {{ Html::style('public/manager/assets/css/font.css') }}

  <!-- CORE -->
  {{ Html::style('public/manager/assets/css/select2.css') }}  
  {{ Html::style('public/manager/assets/css/style.css') }}
  {{ Html::style('public/manager/assets/css/custom.css') }}
  {{ Html::script('public/manager/assets/js/modernizr.js') }}
</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="signup">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel">
          <div class="panel-heading">
            <h4 class="panel-title">System Installation</h4>
          </div>
          <div class="panel-body">
            @if ( count($errors) > 0 )
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
              {{ $error }}<br>
              @endforeach
            </div>
            @endif
            {{ Form::open([ 'route' => 'system.install' ]) }}
            <div class="row">
              <div class="col-md-5">
                <h4>Database setup</h4>
                <p class="help-block">Please set database information here.</p>
              </div>
              <div class="col-md-7">
                <div class="form-group mb10">
                  <label>Hostname: *</label>
                  {{ Form::text('dbhost', null, ['class' => 'form-control', 'placeholder' => 'localhost']) }}
                </div>
                <div class="form-group mb10">
                  <label>Database: *</label>
                  {{ Form::text('dbname', null, ['class' => 'form-control', 'placeholder' => 'Database name']) }}
                </div>
                <div class="form-group mb10">
                  <label>Username: *</label>
                  {{ Form::text('dbuser', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group mb10">
                  <label>Password: *</label>
                  {{ Form::text('dbpass', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group mb10">
                  <label>Database Prefix:</label>
                  {{ Form::text('prefix', null, ['class' => 'form-control', 'placeholder' => 'Database prefix']) }}
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-5">
                <h4>Account setup</h4>
                <p class="help-block">Set administrator account.</p>
              </div>
              <div class="col-md-7">
                <div class="form-group mb10">
                  <label>Rolename: *</label>
                  {{ Form::text('rolename', 'Administrator', ['class' => 'form-control']) }}
                </div>
                <div class="form-group mb10">
                  <label>Email Address: *</label>
                  {{ Form::text('usermail', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group mb10">
                  <label>Username: *</label>
                  {{ Form::text('username', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group mb10">
                  <label>Password: *</label>
                  {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-5">
                <h4>Application settings</h4>
                <p class="help-block">Set base settings for the application.</p>
              </div>
              <div class="col-md-7">
                <div class="form-group mb10">
                  <label>Timezone:</label>
                  <select class="form-control" name="timezone">
                  @foreach ( $timezones as $timezone )
                    <option value="{{ $timezone }}" @if( $timezone == date('e') ) selected @endif>{{ $timezone }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>
            <hr class="invisible">
            <div class="form-group">
              <button class="btn btn-success btn-quirk btn-block">Install</button>
            </div>
            {{ Form::close() }}
            <hr class="invisible">
            <center>{!! FOOTPRINT !!}</center>
          </div>
        </div><!-- panel -->
      </div>
    </div>
  </div>
  {{ Html::script('public/manager/assets/js/jquery-2.1.4.min.js') }}
  {{ Html::script('public/manager/assets/js/select2.js') }}
  <script type="text/javascript">
  $(document).ready(function() {
    $('select').select2();
  });
  </script>
</body>
</html>