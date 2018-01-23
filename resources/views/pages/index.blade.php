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
  <div class="small-title">Most viewed</div><h1 class="title">POSTS</h1>

  <div id="small-blog">
    <div class="flex">
    <div class="image">
      <img src="images/test.jpg" alt="">
    </div>
    <div class="title">
      How to become minimalist - my story
    </div>
    </div>
    <div class="info">
      <div>
      By Elvis Ecodews - May 31 2017 <i class="fa fa-comments" aria-hidden="true"></i> 1
      </div>
      <a href="" class="button">Read More</a>
      </div>
  </div>

  <div id="small-blog">
    <div class="flex">
    <div class="image">
      <img src="images/test.jpg" alt="">
    </div>
    <div class="title">
      Greece hotel holiday luxury house
    </div>
    </div>
    <div class="info">
      <div>
      By Elvis Ecodews - May 31 2017 <i class="fa fa-comments" aria-hidden="true"></i> 1
      </div>
      <a href="" class="button">Read More</a>
      </div>
  </div>

  <div id="small-blog">
    <div class="flex">
    <div class="image">
      <img src="images/test.jpg" alt="">
    </div>
    <div class="title">
      Isn’t it wonderful to be alive?
    </div>
    </div>
    <div class="info">
    <div>
    By Elvis Ecodews - May 31 2017 <i class="fa fa-comments" aria-hidden="true"></i> 1
    </div>
    <a href="" class="button">Read More</a>
    </div>
  </div>



  </div>



    </div>
    @include('_includes.sidepanel.main')
    </div>
  </div>
@endsection
