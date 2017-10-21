@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Blog Posts</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Post</a>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Category</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->slug}}</td>
              <td>{{$post->category->name}}</td>
              <td><a class="button is-outlined is-small is-pulled-right" href="{{route('posts.edit', $post->id)}}">Edit</a>
              <a class="button is-outlined is-small is-pulled-right" href="{{route('posts.show', $post->id)}}">View</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!!"<center>"!!}{{ $posts->links()}}{!!"</center>"!!}
      </div>
 <!-- end of .card -->

</div>
</div>

@endsection
