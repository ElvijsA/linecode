<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class ManageController extends Controller
{
    public function index()
    {
      return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
      $categories = Category::all();
      $posts = Post::all();
      $users = User::all();
      return view('manage.dashboard')->withCategories($categories)->withPosts($posts)->withUsers($users);
    }
}
