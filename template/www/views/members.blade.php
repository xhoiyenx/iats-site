@extends('inc.master')
@section('title', $page)
@section('content')

<div class="posts">

  <div class="post">
    <div class="post-profile row">
      <div class="col-xs-12">
        <div class="entry-content">
          <img src="{{ url('member-list.jpg') }}" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
                    
@endsection