@extends('layouts.manage')

@section('content')
<div class="flex-container box">
  <div class="column">
    <h1 class="title">Manage Roles</h1>
  </div>
  <div class="column">
    <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right">Create New Role</a>
  </div>
  <hr class="m-t-0">

  <div class="columns is-multiline">
    @foreach ($roles as $role)
      <div class="column is-half">
        <div class="box box-small">
          <article class="media">
            <div class="media-content">
              <h4 class="small-title">{{$role->display_name}}</h4>
              <h5 ><em>{{$role->name}}</em></h5>
              <p class="p-t-10">
                {{$role->description}}
              </p>

              <nav class="level is-mobile">
                  <div class="column is-one-half">
                    <div class="level-item">
                      <a href="{{route('roles.show', $role->id)}}" class="button is-primary is-fullwidth">Details</a>
                    </div>
                  </div>
                  <div class="column is-one-half">
                    <div class="level-item">
                      <a href="{{route('roles.edit', $role->id)}}" class="button is-light is-fullwidth">Edit</a>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </article>
        </div>
    @endforeach
  </div>
</div>
@endsection
