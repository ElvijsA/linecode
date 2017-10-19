@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$post->title}}</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <p>{{$post->post_image}}</p>
    <p>{{$post->category->name}}</p>
    <p>{!! $post->body !!}</p>


    <div class="columns">
      <div class="column">
        <a href="{{route('posts.edit', $post->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Edit Post</a>
          <a class="button is-outlined is-pulled-right" href="{{route('posts.index')}}">Back</a></td>
      </div>
    </div>



  </div>

@endsection
