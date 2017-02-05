@extends('inc.master')
@section('title', $page)
@section('content')

@if (count($list) > 0)
  <div class="posts">
  @foreach ($list as $data)

    <div class="post">
      <div class="post-profile row">
        <div class="col-xs-12">
          <div class="featured-image">
            @if (!empty($data->image))
            <p style="text-align: center;"><a href="{{ route('www.blog', $data->blog_id) }}"><img class="img-responsive" src="{{ url('uploads/blog') . '/' . $data->image }}"></a></p>
            @endif
          </div>
          <div class="profile">
            <span class="location">
              <span class="post-title">{{ $data->title }}</span>
              <span class="post-date pull-right">{{ $data->created_at->format('d M Y') }}</span>
            </span>
          </div>
          <div class="entry-content">
            {!! nl2br($data->short_description) !!}
          </div>
          <div class="entry-social" style="margin-bottom: 15px">
            <div class="fb-share-button" data-href="{{ route('www.blog', $data->blog_id) }}" data-layout="button_count" data-size="large" data-mobile-iframe="true">
              <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('www.blog', $data->blog_id) }}">Share</a>
            </div>
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
                    
  @endforeach
  </div>
@endif

@endsection