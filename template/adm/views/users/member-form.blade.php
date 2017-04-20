<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 09/03/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Page update form
 */
?>
@extends('inc.master')
@section('title', $page)
@section('content')
{{ Form::model($form, ['route' => 'member::save', 'files' => true]) }}
{{ Form::hidden('member_id', $form->member_id) }}
<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-file-o"></i>{{ $page or '' }}
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
    <a href="{{ route('member::index') }}" class="btn btn-primary btn-quirk">Exit</a>
  </div>  
</h1>
@include('inc.messages')
<div class="row">
  <div class="col-md-12">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-line">
      <li class="active"><a href="#general" data-toggle="tab"><strong>General</strong></a></li>
      <li><a href="#payments" data-toggle="tab"><strong>Payment Methods</strong></a></li>
      <li><a href="#subscription" data-toggle="tab"><strong>Subscription</strong></a></li>
      <li><a href="#statistic" data-toggle="tab"><strong>Statistics</strong></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="general">
        @include('users.member.general')
      </div>
      <div class="tab-pane" id="payments">
      </div>
      <div class="tab-pane" id="subscription">
      </div>
      <div class="tab-pane" id="statistic">
      </div>
    </div>

  </div>
</div>
{{ Form::close() }}
<script type="text/javascript">

  // Show image preview
  $('#image').change(function(event) {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });
</script>
@endsection