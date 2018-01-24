<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index(){
      $latestposts = Post::orderBy('created_at','desc')->limit(3)->get();
      return view('pages/index')->withPosts($latestposts);
    }

    public function blog(){
        return view('pages/blog');
    }
}
