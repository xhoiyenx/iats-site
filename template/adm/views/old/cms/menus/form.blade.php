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
@section('content')
{{ Form::model($form, ['route' => 'manager.cms.menu.save']) }}
{{ Form::hidden('id', $form->id) }}
{{ Form::hidden('menu_parent', $form->menu_parent) }}

<h1 class="manager-title clearfix">
  <i class="fa fa-fw fa-file-o"></i>{{ $page or '' }}
  <div class="btn-toolbar pull-right">
    <button type="submit" class="btn btn-success btn-quirk">Save</button>
    <a href="{{ route('manager.cms.menu', ['sub' => Request::get('sub')]) }}" class="btn btn-primary btn-quirk">Exit</a>
  </div>  
</h1>
@include('inc.messages')
<div class="row">
  <div class="col-md-9">

    <div class="panel">
      <div class="panel-body">
        <div class="form-group">
          <label>Name: <span class="required">*</span></label>
          {{ Form::text('menu_name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label>Link: <span class="required">*</span></label>
          <div class="input-group">
            <div class="input-group-addon">{{ url('/') }}/</div>
            {{ Form::text('menu_link', null, ['class' => 'form-control']) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Menu:</label>
              {{ Form::select('menu_type', config('cms.menus'), null, ['class' => 'form-control']) }}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sort:</label>
              {{ Form::text('sort', null, ['class' => 'form-control']) }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Status:</label>
              {{ Form::select('status', config('cms.menu_status'), null, ['class' => 'form-control']) }}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Show in new tab:</label>
              <label class="ckbox">
                {{ Form::checkbox('new_tab', 1) }}<span>Yes</span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-3">

    <div class="panel">
      <div class="panel-body">
        <div class="form-group">
          <label>Type:</label>
          {{ Form::select('link_type', $menu_type, null, ['class' => 'form-control']) }}
        </div>
        <div class="link-types page">
          <div class="form-group">
            <label>Page:</label>
            {{ Form::select('meta[page_id]', $page_list::getSelect(), null, ['class' => 'form-control cms', 'style' => 'width:100%']) }}
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
{{ Form::close() }}
@endsection

@section('after_footer')
<script type="text/javascript">
$(document).ready(function() {

  /**
   * Show link field depends on selected menu type
   */
  var $link_type = $('select[name=link_type]').val();
  $('.' + $link_type).show();
  //$('.link-types:hidden').find('input').attr('disabled', '');

  $('select[name=link_type]').change(function(event) {
    $('.link-types').hide();
    $('.' + $(this).val()).show();
    //$('.link-types:hidden').find('input').attr('disabled', '');
    //$('.' + $(this).val()).find('input').removeAttr('disabled');
  });

  /**
   * Focus on menu name onload
   */
  $('input[name=menu_name]').focus();

  /**
   * Initialize select2
   */
  $('select[name=menu_link]').select2({
    placeholder: 'Select an option'
  });

  $('select.form-control').select2({
    minimumResultsForSearch: Infinity
  });

  $('select.cms').change(function(event) {
    
    var $val = $(this).val();
    if ($val != '') {
      $.post('{{ route('manager.cms.menu.ajax') }}', {
          action: 'page',
          id: $val
        }, 
        function(data, textStatus, xhr) {
          if (data != '') {
            $('input[name=menu_link]').val(data);
          }
        }
      );
    }

  });

});
</script>
@endsection