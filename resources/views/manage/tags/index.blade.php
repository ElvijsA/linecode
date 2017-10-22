@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Tags</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <a href="{{route('tags.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Tag</a>
      </div>
    </div>


    <div class="card">
      <div class="card-content">
        <table class="table is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($tags as $tag)
            <tr>
              <td>{{$tag->id}}</td>
              <td>{{$tag->name}}</td>
              <td><a class="button is-outlined is-small is-pulled-right" href="{{route('tags.show', $tag->id)}}">View</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
 <!-- end of .card -->

</div>
</div>

@endsection
