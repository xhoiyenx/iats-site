<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 1.0.0
 * Last Update: 07/07/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * 404 template
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>404 Page Not Found</title>

  <!-- FONTS -->
  {{ Html::style('public/manager/assets/css/font-awesome.min.css') }}
  {{ Html::style('public/manager/assets/css/font.css') }}

  {{ Html::style('public/manager/assets/css/style.css') }}

  {{ Html::script('public/manager/assets/js/modernizr.js') }}
</head>

<body>
  <section>

    <div class="notfoundpanel">
      <h1>404!</h1>
      <h3>The page you are looking for has not been found!</h3>
      <h4>The page you are looking for might have been removed, had its name changed,<br>or unavailable. Maybe you could try a search:</h4>
      <form action="http://themepixels.com/demo/webpage/quirk/templates/index.html">
        <div class="input-group mb15">
          <input type="text" class="form-control" placeholder="Search here">
          <span class="input-group-btn">
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-search"></i></button>
          </span>
        </div>
      </form>
      <hr class="darken">
      <ul class="list-inline">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Contact Us</a></li>
        <li class="pull-right">Quirk &copy; 2015. All Rights Reserved.</li>
      </ul>
    </div><!-- notfoundpanel -->

  </section>
</body>
</html>