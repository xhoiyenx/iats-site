@extends('inc.master')
@section('title', $page)
@push('head')
<meta property="og:image" content="{{ url('uploads/blog') . '/' . $data->image }}">
@endpush
@section('content')

<div class="posts">

  <div class="post">
    <div class="post-profile row">
      <div class="col-xs-12">
          <div class="profile">
            <span class="location">
              <span class="post-title">{{ $data->title }}</span>
              <span class="post-date pull-right">{{ $data->created_at->format('d M Y') }}</span>
            </span>
          </div>
        <div class="entry-content">
          {!! $data->description !!}
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
    <br>
    @if (isset($list))
    <div class="post-profile row">
      <div class="col-md-12">
        <h3 style="margin-bottom: 15px;">Related Articles</h3>
      </div>
    @foreach ($list as $item)
      <div class="col-md-3" style="margin-bottom: 20px">
        <div class="featured-image">
          @if (!empty($item->image))
          <p style="text-align: center;"><a href="{{ route('www.blog', $item->blog_id) }}"><img style="height: 154px; width: auto !important" class="img-responsive" src="{{ url('uploads/blog') . '/' . $item->image }}"></a></p>
          @endif
        </div>
        <div class="profile" style="min-height: 43px;">
          <span class="location">
            <span class="post-title">{{ $item->title }}</span>
          </span>
        </div>
        <div class="entry-content" style="text-align: justify; padding-top: 0">
          {!! nl2br($item->short_description) !!}
        </div>
      </div>
    @endforeach
    </div>
    @endif
  </div>
</div>
                    
@endsection