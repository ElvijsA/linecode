@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="econtent">
    <div class="main">


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
         </div>
         <div class="post-body">
            {!! $post->body !!}
         </div>


          </div>

        </div>

        <div class="box">
         <div class="columns">
             <div class="column">
               <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <div class="field">
                   <label for="name" class="label">Comment</label>
                  <p class="control">
                     <div class="boxsizingBorder">
                       <textarea  class="input" name="name"></textarea>
                     </div>
                  </p>
               </div>
                  <a href="{{route('blog')}}" class="button is-pulled-right">Back to Blog</a>
                  <input class="button is-pulled-right" type="submit" name="" value="Add Comment">
               </form>
            </div>
         </div>
        </div>

        <div class="box">
           COMMENTS HERE
        </div>
    </div>

    </div>
  </div>
@endsection
