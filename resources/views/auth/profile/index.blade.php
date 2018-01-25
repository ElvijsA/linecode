@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="econtent">
    <div class="main">

   <div class="box">
      <div class="small-title">User</div><h1 class="title">PROFILE</h1>
      <div class="columns">
        <div class="column">

          <div class="field">
           <label for="name" class="label">Name</label>
           <p>
             {{$user->name}}
           </p>
          </div>

          <div class="field">
           <label for="email" class="label">Email</label>
           <p>
             {{$user->email}}
           </p>
          </div>


          <div class="field">
           <label for="email" class="label">Create Date</label>
           <p>
             {{$user->created_at->toFormattedDateString()}}
           </p>
          </div>


          <div class="field">
           <label for="email" class="label">Roles</label>
           <ul>
             {{$user->roles->count() == 0 ? 'This user has not been asigned to any Roles yet' : ''}}
                @foreach ($user->roles as $role)
                  <li>{{$role->display_name}} ({{$role->description}})</li>
                @endforeach
           </ul>
          </div>



        </div>
      </div>
      
   </div>

    </div>
    @include('_includes.sidepanel.main')
    </div>
  </div>
@endsection
