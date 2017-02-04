@extends('inc.master')
@section('title', $page)
@section('content')

<div class="posts">

  <div class="post">
    <div class="post-profile row">
      <div class="col-xs-12">
        <span class="avatar">
          <a href="#"><img src="{{ $assets }}/images/avatar.png" class="img-fluid"></a>
        </span>
        <div class="profile">
          <span class="username"><strong>Official.IATS</strong></span><br>
          <span class="location">
            <i class="fa fa-fw fa-map-marker"></i> Alterpro Automotive
            <span class="post-date pull-right">{{ $data->created_at->format('d M Y') }}</span>
          </span>
        </div>
        <div class="entry-content">
          {!! $data->description !!}
        </div>
        @if (count($data->tags) > 0)
        <div class="tags">
          @foreach ($data->tags as $tags)
          <span class="tag">{{ $tags }}</span>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
                    
@endsection