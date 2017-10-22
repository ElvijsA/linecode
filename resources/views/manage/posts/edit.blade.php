@extends('layouts.manage')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('js/minified/themes/default.min.css') }}" />
@endsection

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

  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="{{ asset('js/minified/jquery.sceditor.xhtml.min.js') }}"></script>
  <script>
  	$(function() {
  	    // Replace class bbarea with skeditor
  	    $('.ckeditor').sceditor({
  	    plugins: 'xhtml',
  			width: '100%',
  			emoticonsRoot: '{{ asset('js') }}/',
  			toolbar: "font,size,color,removeformat|cut,copy,paste|bold,italic,underline|left,center,right|bulletlist,orderedlist|link,code,quote|youtube,image,emoticon|source"
  	    });
  	});

  </script>

  <script>
  $(document).ready(function() {

    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags->pluck('id')->all()) !!}).trigger('change');
  });
  </script>
@endsection
