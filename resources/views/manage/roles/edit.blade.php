@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit {{$role->display_name}}</h1>
      </div>
      <div class="column">
      <a href="{{'roles.create'}}" class="button is-primary is-pulled-right">Edit Role</a>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('roles.update', $role->id)}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title-small">Role Details:</h2>

                  <div class="field">
                    <p class="control">
                    <label for="display_name">Name (Human Readable)</label>
                    <input type="text" class="input" name="display_name" value="{{$role->display_name}}" id="display_name">
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                    <label for="display_name">Slug (Can not be edited)</label>
                    <input type="text" class="input" name="name" value="{{$role->name}}" disabled id="name">
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <label for="description">Description</label>
                      <input type="text" class="input" name="name" value="{{$role->description}}" id="description">
                    </p>
                  </div>

                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </form>

    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h2 class="title-small">Permissions:</h1>
                <ul>
                  @foreach ($role->permissions as $r)
                    <li>{{$r->display_name}} <em class="m-l-15">({{$r->description}})</em></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>

  </div>
@endsection
