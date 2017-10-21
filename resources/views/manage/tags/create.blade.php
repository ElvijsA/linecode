@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Category</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <form action="{{route('tags.store')}}" method="POST">
          {{csrf_field()}}

          <div class="field">
            <label for="name" class="label">Tag Name</label>
            <p class="control">
              <input class="input" type="text" name="name" id="name">
            </p>
          </div>

          <button class="button is-success">Create Tag</button>
        </form>
      </div>
    </div>
  </div>

  @endsection
