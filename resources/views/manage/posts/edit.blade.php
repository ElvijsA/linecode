@extends('layouts.manage')

@section('content')
  <div class="flex-container box">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit User</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <input name="_method" type="hidden" value="PATCH">

          <div class="field">
            <label for="name" class="label">Title</label>
            <p class="control">
              <input class="input" type="text" name="title" id="title" value="{{$post->title}}">
            </p>
          </div>

          <div class="field">
            <label for="name" class="label">Slug</label>
            <p class="control">
              <input class="input" type="text" name="slug" id="slug" disabled value="{{$post->slug}}">
            </p>
          </div>

          <div class="field">

            <label for="name" class="label">Category</label>
            <div class="select">
              <select name="category_id">
                  @foreach ($categories as $category)
                    <option
                    @if ($post->category_id == $category->id)
                      selected="selected"
                    @endif
                      value="{{ $category->id }}">{{ $category->name }}
                    </option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="field">
            <label for="body" class="label">Body</label>
            <p class="control">
              <textarea class="textarea ckeditor" name="body" id="body">{{$post->body}}
              </textarea>
            </p>
          </div>


          <div class="field">
            <label for="file-input" class="label">
              <input class="input" type="file" name="post_image" id="post_image">
            </label>
          </div>

          <button class="button is-success">Update Post</button>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>

  <script>

      ClassicEditor
          .create( document.querySelector( '.ckeditor',{
            resize: {
                minHeight: 300,
                maxHeight: 800
            }
          }) 


        )
          .catch( error => {
              console.error( error );
          } );
  </script>
@endsection
