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
        <div class="box">
            <router-view name="imagesIndex"></router-view>
            <router-view></router-view>
        </div>
      </div>
    </div>
</div>

@endsection
