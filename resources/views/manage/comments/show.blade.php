@extends('layouts.manage')

@section('content')
  <div id="box-body" class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$post->title}}</h1>
      </div>
    </div>
    <p class="is-pulled-right"><strong>Category</strong> - {{$post->category->name}}</p>
    <img src="{{ asset('images/post_images/' . $post->post_image )}}" alt="">



    <strong>Tags</strong> -
      @foreach ($post->tags as $tag )
      <span class="tag is-dark">{{$tag->name}}</span>
      @endforeach
    </p>

   <div class="post-body">
      {!! $post->body !!}
   </div>


    <div class="columns">
      <div class="column">
        <a href="{{route('posts.edit', $post->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Edit Post</a>
          <a class="button is-outlined is-pulled-right" href="{{route('posts.index')}}">Back</a></td>
      </div>
    </div>



  </div>

@endsection
