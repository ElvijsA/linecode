@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="econtent">
    <div class="main">

<!--
 <div class="box">
    <div class="small-title">Youtube Channel</div><h1 class="title">LINECODE</h1>
      <div class="col1">
        <div class="video-box">
         <div class="video-strip">
           <div class="flex-video">
             <iframe src="https://www.youtube.com/embed/jxJYbfUCCGo" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
           </div>
         </div>
       </div>
     </div>
  </div>

    <div class="box">
    <div class="small-title">Latest</div><h1 class="title">PROJECTS</h1>
    <div class="works">
    <div class="grid-container">


      <figure class="work">
            <img src="images/works/work4.jpg" alt="">
            <figcaption>
            <h2 class="name">ECODEWS v1.0 CURRENT WEB SITE</h2>
          </figcaption>
        </figure>

      <figure class="work">
        <img src="images/works/work3.jpg" alt="">
        <figcaption>
        <h2 class="name">ECODEWS v0.8</h2>
        </figcaption>
      </figure>

      <figure class="work">
        <img src="images/works/work2.jpg" alt="">
        <figcaption>
        <h2 class="name">CAR WASH WEB SITE</h2>
        </figcaption>
      </figure>

      <figure class="work">
        <img src="images/works/work1.jpg" alt="">
        <figcaption>
        <h2 class="name">ECODEWS v0.9</h2>
        </figcaption>
      </figure>

    </div>
    </div>
    </div>
-->
   <div class="box">
      <div class="small-title">Current</div><h1 class="title">STATUS</h1>
      CMS is still in development currrently working on Admin Dashboard.
   </div>


  <div class="box">
  <div class="small-title">Latest</div><h1 class="title">POSTS</h1>

  @foreach ($posts as $post)
     <div id="small-blog">
      <div class="flex">
      <div class="image">
         <img src="{{ asset('images/post_images/' . $post->post_image )}}" alt="{{$post->post_image}}">
      </div>
      <div class="title">
          {{ $post->title}}
      </div>
      </div>
      <div class="info">
         <div>
         {{ $post->category->name }} By {{ $post->user->name }} - {{$post->created_at->toFormattedDateString()}} <i class="fa fa-comments" aria-hidden="true"></i> 1
         </div>
         <a href="{{route('blog.show', $post->slug)}}" class="button">Read More</a>
         </div>
     </div>
  @endforeach
 </div>



    </div>
    @include('_includes.sidepanel.main')
    </div>
  </div>
@endsection
