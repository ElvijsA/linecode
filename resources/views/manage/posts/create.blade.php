@extends('layouts.manage')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('js/minified/themes/default.min.css') }}" />
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
              <input class="input is-large {{$errors->has('title') ? 'is-danger' : ''}}" type="text" value="{{ old('title') }}" name="title" id="title" v-model="title" />
            </p>
            @if ($errors->has('title'))
                <p class="help is-danger">{{$errors->first('title')}}</p>
            @endif
          </div>

          <div class="field">
            <label for="name" class="label">Slug</label>

            <slug-widget url="{{url('/')}}" subdirectory="/blog/" :title="title" @slug-changed="updateSlug"></slug-widget>
            <input type="hidden" v-model="slug" value="{{ old('slug') }}" name="slug" id="slug">

            @if ($errors->has('slug'))
                <p class="help is-danger">{{$errors->first('slug')}}</p>
            @endif
          </div>

          <div class="field">
            <label for="name" class="label">Category</label>
            <div class="select">
              <select name="category_id" class="{{$errors->has('category_id') ? 'is-danger' : ''}}">
                  @foreach ($categories as $category)
                      <option  value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              @if ($errors->has('category_id'))
                  <p class="help is-danger">{{$errors->first('category_id')}}</p>
              @endif
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
                {{ old('body') }}
              </textarea>
            </p>
            @if ($errors->has('body'))
                <p class="help is-danger">{{$errors->first('body')}}</p>
            @endif
          </div>


          <div class="field file">
            <label for="file-input" class="file-label">
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
   <script>
      var app = new Vue({
         el: '.box',
         data: {
            title: '',
            slug: '',
            api_token: '{{Auth::user()->api_token}}'
         },
         methods: {
            updateSlug: function(val) {
               this.slug = val;
            }
         }
      });
   </script>

  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="{{ asset('js/minified/jquery.sceditor.bbcode.min.js') }}"></script>

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
  });
  </script>
@endsection
