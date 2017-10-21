@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Tag - {{$tag->name}}</h1>
      </div>
    </div>
    <hr class="m-t-0">


    <div class="columns">
      <div class="column">
        <a href="{{route('tags.edit', $tag->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Edit Tag</a>
          <a class="button is-outlined is-pulled-right" href="{{route('tags.index')}}">Back</a></td>
      </div>
    </div>



  </div>

@endsection
