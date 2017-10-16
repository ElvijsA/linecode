@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="econtent">
    <div class="main">

      <!--CONTENT START-->
      <div class="box">
      <div id="blog">
        <div class="title">
          How to become minimalist - my story
        </div>
        <div class="info">
          By Elvis Ecodews - May 31 2017
        </div>
        <div class="image">
          <img src="images/test.jpg" alt="">
        </div>
        <div class="info">
        Comments 1
        <a href="" class="button">Read More</a>
        </div>
      </div>
      </div>

      <div class="box">
      <div id="blog">
        <div class="title">
          How to become minimalist - my story
        </div>
        <div class="info">
          By Elvis Ecodews - May 31 2017
        </div>
        <div class="image">
          <img src="images/test.jpg" alt="">
        </div>
        <div class="info">
        Comments 1
        <a href="" class="button">Read More</a>
        </div>
      </div>
      </div>

      <div class="box">
      <div id="blog">
        <div class="title">
          How to become minimalist - my story
        </div>
        <div class="info">
          By Elvis Ecodews - May 31 2017
        </div>
        <div class="image">
          <img src="images/test.jpg" alt="">
        </div>
        <div class="info">
        Comments 1
        <a href="" class="button">Read More</a>
        </div>
      </div>
      </div>
    <!--CONTENT FINISH-->

    </div>
    @include('_includes.sidepanel.main')
    </div>
  </div>
@endsection
