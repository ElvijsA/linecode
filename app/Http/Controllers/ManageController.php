<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;

class ManageController extends Controller
{
   public function index()
   {
      return redirect()->route('manage.dashboard');
   }

   public function dashboard()
   {
      $users = User::all();
      $posts = Post::all();
      $categories = Category::all();
      $tags = Tag::all();
      return view('manage.dashboard')->withUsers($users)->withPosts($posts)->withCategories($categories)->withTags($tags);
   }
}
