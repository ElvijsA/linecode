<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class BlogController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('created_at','desc')->paginate(5);
      return view('blog.index')->withPosts($posts);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      $post = Post::find($id);
      return view('blog.show')->withPost($post);
    }
}
