@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="econtent">
    <div class="main">
      @foreach ($posts as $post)

        <div class="box">

        <div id="blog">
          <div class="title">
            {{ $post->title }}
          </div>

          <div class="info">
            In {{ $post->category->name }} By {{ $post->user->name }} on {{$post->created_at->toFormattedDateString()}}
          </div>
          <div class="image">
            <img src="{{ asset('images/post_images/' . $post->post_image )}}" alt="">
          </div>
          <div class="info">
          <div>
              @foreach ($post->tags as $tag )
              <span class="tag is-dark">{{$tag->name}}</span>
              @endforeach
          </div>

          <a href="{{route('blog.show', $post->id)}}" class="button">Read More</a>
          </div>
        </div>
        </div>
      @endforeach
      {!!"<center>"!!}{{ $posts->links()}}{!!"</center>"!!}

    </div>
    @include('_includes.sidepanel.main')
    </div>
  </div>
@endsection
