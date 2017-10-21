@extends('layouts.manage')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Post</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="field">
            <label for="name" class="label">Title</label>
            <p class="control">
              <input class="input" type="text" name="title" id="title">
            </p>
          </div>

          <div class="field">
            <label for="name" class="label">Slug</label>
            <p class="control">
              <input class="input" type="text" name="slug" id="slug">
            </p>
          </div>

          <div class="field">
            <label for="name" class="label">Category</label>
            <div class="select">
              <select name="category_id">
                  @foreach ($categories as $category)
                      <option  value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="field">
            <label for="tags" class="label">Tags</label>

              <select class="select select2-multi is-fullwidth" name="tags[]" multiple="multiple">
                  @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
              </select>

          </div>

          <div class="field">
            <label for="body" class="label">Body</label>
            <p class="control">
              <textarea class="textarea ckeditor" name="body" id="body">
              </textarea>
            </p>
          </div>


          <div class="field">
            <label for="file-input" class="label">
              <input class="input" type="file" name="post_image" id="post_image">
            </label>
          </div>

          <button class="button is-success">Create Post</button>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>

  <script>

      ClassicEditor
          .create( document.querySelector( '.ckeditor',{}) )
          .catch( error => {
              console.error( error );
          } );
  </script>
  <script>
  $(document).ready(function() {
    $('.select2-multi').select2();
  });
  </script>
@endsection
