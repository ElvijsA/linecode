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
                  @foreach ($post->tags as $tag )
                  <span class="tag is-dark">{{$tag->name}}</span>
                  @endforeach
               </div>

               <div class="image">
                  <img src="{{ asset('images/post_images/' . $post->post_image )}}" alt="">
               </div>

               <div class="post-body">
                  {!! $post->body !!}
               </div>

            </div>
         </div>

         <div class="box">
            <div class="add-comment-box">
               <comment-widget></comment-widget>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
@if (Auth::check())
      <script>
         var app = new Vue({
            el: '.add-comment-box',
            data: {
               api_token: '{{Auth::user()->api_token}}',
               user_id: '{{Auth::user()->id}}',
               post_id: '{{$post->id}}'
            }
         });
      </script>
@endif
      <script>
      </script>
@endsection
