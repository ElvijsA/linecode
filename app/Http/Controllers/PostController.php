<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('manage.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('manage.posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id' => 'required|integer',
          'body' => 'required',
          'post_image' => 'image|nullable|max:1999',
        ]);

        //Handle File Upload
          if($request->hasFile('post_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('post_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('post_image')->storeAs('public/images/post_images', $fileNameToStore);
          }else{
            $fileNameToStore = 'noimage.jpg';
          }

        //Create Post
          $post = new Post;
          $post->title = $request->input('title');
          $post->slug = $request->input('slug');
          $post->category_id = $request->input('category_id');
          $post->body = $request->input('body');
          $post->user_id = auth()->user()->id;
          $post->post_image = $fileNameToStore;

          //Save PostController
          if($post->save()){
          return redirect()->route('posts.index', $post->id);
          }else{
          return redirect()->route('posts.create');
          }
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
        return view('manage.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('manage.posts.edit')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //Get current Post
      $post = Post::find($id);
      //Validate data
      $this->validate($request, [
          'title' => 'required',
          'category_id' => 'required|integer',
          'body' => 'required'
      ]);

      // Handle File Upload
      if($request->hasFile('cover_image')){
        //Get tile name with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
      }

      //Update Post Setting Variables
      $post->title = $request->input('title');
      $post->category_id = $request->input('category_id');
      $post->body = $request->input('body');
      if($request->hasFile('cover_image')){
          $post->cover_image = $fileNameToStore;
      }

      //Save PostController
      if($post->save())
      {return redirect()->route('posts.show', $post->id);}
      else
      {return redirect()->route('posts.create');}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
