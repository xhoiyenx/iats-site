@extends('inc.master')
@section('title', $page)
@section('content')

@if (count($list) > 0)
  <div class="posts">
  @foreach ($list as $data)

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
            @if (!empty($data->image))
            <p><a href="{{ route('www.blog', $data->blog_id) }}"><img src="{{ url('uploads/blog') . '/' . $data->image }}"></a></p>
            @endif
            {!! nl2br($data->short_description) !!}
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