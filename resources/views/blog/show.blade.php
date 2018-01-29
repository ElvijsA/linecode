@extends('layouts.app')

@section('content')
<div class="container">
   <div class="econtent">
      <div class="main">
         <div class="box">
            <div id="blog">

               <div class="title">
                  {{ $post->title }}
               </div>

               <div class="info">
                  In {{ $post->category->name }} By {{ $post->user->name }} on {{$post->created_at->toFormattedDateString()}}
                  @foreach ($post->tags as $tag )
                  <span class="tag is-dark">{{$tag->name}}</span>
                  @endforeach
               </div>

               <div class="image">
                  <img src="{{ asset('images/post_images/' . $post->post_image )}}" alt="">
               </div>

               <div class="post-body">
                  {!! $post->body !!}
               </div>

            </div>
         </div>

         <div class="box">
            <div class="add-comment-box">
                  <comment-log :comments="comments"></comment-log>
                  @if (Auth::check())
                     <comment-composer v-on:commentsend="addComment"></comment-composer>
                  @endif
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
   <script>
      const app = new Vue ({
         el: '#app',
         data: {
            comments:[]
         },
         methods: {
            addComment(comment) {
               @if(Auth::check()) {
               comment.user_id = {{ Auth::user()->id }};
               comment.user.name = '{{ Auth::user()->name }}';
               comment.post_id = {{ $post->id }};
               this.comments.push(comment);
               //Save in to database
               axios.post('/api/comments', comment).then(response => {
                     //
               })
               }@endif
            }
         },
         created(){
            axios.get('/api/comments/{{ $post->id }}').then(response => {
               this.comments = response.data;
            });
         }
      });
   </script>
@endsection
