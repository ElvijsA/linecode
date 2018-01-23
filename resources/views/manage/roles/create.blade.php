@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Role</h1>
      </div>

    </div>
    <hr class="m-t-0">
    <form action="{{route('roles.store')}}" method="POST">
      {{ csrf_field() }}

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
                    <input type="text" class="input" name="display_name" value="{{old('display_name')}}" id="display_name">
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                    <label for="display_name">Slug (Can not be changed)</label>
                    <input type="text" class="input" name="name" value="{{old('name')}}" id="name">
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <label for="description">Description</label>
                      <input type="text" class="input" name="description" value="{{old('description')}}" id="description">
                    </p>
                  </div>
                  <input type="hidden" :value="permissionsSelected" name="permissions">
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>


    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h2 class="title-small">Permissions:</h1>
                <b-checkbox-group v-model="permissionsSelected">
                  @foreach ($permissions as $permission)
                    <div class="field">
                      <b-checkbox v-model="permissionsSelected" :native-value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                    </div>
                  @endforeach
              </div>
            </div>
          </article>
        </div> <!--END OF BOX-->

        <button class="button is-primary pull-right">Create New User</button>
      </div>
    </div>
  </form>
  </div>
@endsection

@section('scripts')
  <script>

    var app = new Vue({
      el: '.box',
      data: {
        permissionsSelected: []
      }
    });
  </script>
@endsection
