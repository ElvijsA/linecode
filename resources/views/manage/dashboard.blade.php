@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Dashboard</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <nav class="level">
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Categories</p>
      <p class="title">{{$categories->count()}}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Blog Posts</p>
      <p class="title">{{$posts->count()}}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Users</p>
      <p class="title">{{$users->count()}}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Likes</p>
      <p class="title">789</p>
    </div>
  </div>
</nav>
<div class="box">Admin Notifications will be here</div>
      </div>
    </div>
</div>

@endsection
