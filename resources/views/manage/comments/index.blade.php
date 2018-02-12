@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Blog Posts</h1>
      </div>
    </div>
    <hr class="m-t-0">


    <div class="card">
      <div class="card-content">
        <table class="table is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Id</th>
              <th>Comment</th>
              <th>Post ID</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($comments as $comment)
            <tr>
              <td>{{$comment->id}}</td>
              <td>{{$comment->comment}}</td>
              <td>{{$comment->post_id}}</td>
              <td><a class="button is-outlined is-small is-pulled-right" href="">View</a>
              <a class="button is-outlined is-small is-pulled-right" href="">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!!"<center>"!!}{{ $comments->links()}}{!!"</center>"!!}
      </div>
 <!-- end of .card -->

</div>
</div>

@endsection
