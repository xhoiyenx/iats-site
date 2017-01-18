<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 05/03/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Master template for all pages
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $page or '' }} - {{ option('site_title') }}</title>

  <!-- FONTS -->
  {{ Html::style('public/manager/assets/css/font-awesome.min.css') }}
  {{ Html::style('public/manager/assets/css/font.css') }}

  <!-- PLUGINS -->
  {{ Html::style('public/manager/assets/css/select2.css') }}
  {{ Html::style('public/manager/assets/css/jquery.gritter.css') }}
  {{ Html::style('public/manager/assets/lib/redactor/redactor.css') }}

  <!-- CORE -->
  {{ Html::style('public/manager/assets/css/style.css') }}
  {{ Html::style('public/manager/assets/css/custom.css') }}

  {{ Html::script('public/manager/assets/js/modernizr.js') }}
  {{ Html::script('public/manager/assets/js/jquery-3.0.0.min.js') }}  
  {{ Html::script('public/manager/assets/js/jquery-migrate-3.0.0.min.js') }}  
</head>

<body>
  <header>
    <div class="headerpanel">

      <div class="logopanel">
        <h2><a href="index.html">&nbsp;</a></h2>
      </div><!-- logopanel -->

      <div class="headerbar">

        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

        <div class="header-right">
          <ul class="headermenu">
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-logged" data-toggle="dropdown">
                  My Account
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                  <li><a href="signin.html"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
              </div>
            </li>
            <li>
              <button id="chatview" class="btn btn-chat alert-notice">
                <span class="badge-alert"></span>
                <i class="fa fa-comments-o"></i>
              </button>
            </li>
          </ul>
        </div><!-- header-right -->
      </div><!-- headerbar -->
    </div><!-- header-->
  </header>

  <section>

    <div class="leftpanel">
      <div class="leftpanelinner">

        <ul class="nav nav-tabs nav-justified nav-sidebar">
          <li class="tooltips active" data-placement="bottom" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
          <li class="tooltips" data-placement="bottom" data-toggle="tooltip" title="Log Out"><a href="{{ route('manager.logout') }}"><i class="fa fa-sign-out"></i></a></li>
        </ul>

        <div class="tab-content">

          <div class="tab-pane active" id="mainmenu">
          @include('inc.mainmenu')
          </div>

        </div><!-- tab-content -->

      </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->

    <div class="mainpanel">

      <div class="contentpanel">

        @yield('content')

      </div><!-- contentpanel -->
    </div><!-- mainpanel -->
  </section>

  <!-- default modal -->
  <div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
  </div>

  {{ Html::script('public/manager/assets/js/bootstrap.min.js') }}

  <!-- PLUGINS -->
  {{ Html::script('public/manager/assets/js/select2.js') }}
  {{ Html::script('public/manager/assets/js/jquery.gritter.js') }}

  @section('before_footer')@show
  {{ Html::script('public/manager/assets/js/script.js') }}
  {{ Html::script('public/manager/assets/js/app.js') }}
  @section('after_footer')@show
</body>
</html>