<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Purifier;
use Image;
use Storage;
use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
   public function __construct()
   {
      $this->middleware('role:superadministrator|administrator|editor|author|contributor');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index()
   {
      $posts = Post::orderBy('created_at','desc')->paginate(10);
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
      $tags = Tag::all();
      return view('manage.posts.create')->withCategories($categories)->withTags($tags);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   public function store(Request $request)
   {
      //VALIDATE
      $this->validate($request, [
         'title' => 'required|max:255',
         'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
         'category_id' => 'required|integer',
         'body' => 'required|min:20',
         'post_image' => 'image|nullable|max:1999',
      ]);

      //Handle File Upload
         if($request->hasFile('post_image')){
            //Get Image
            $image = $request->file('post_image');
            //Get file name with extension
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('post_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //File Store Location
            $location = public_path('images/post_images/' . $fileNameToStore);
            //Upload Image
            Image::make($image)->resize(800, 400)->save($location);
         }else{
            $fileNameToStore = 'noimage.jpg';
         }

      //Create Post
         $post = new Post;
         $post->title = $request->input('title');
         $post->slug = $request->input('slug');
         $post->category_id = $request->input('category_id');
         //$post->body = Purifier::clean($request->body, 'youtube');
         $post->body = $request->input('body');
         $post->user_id = auth()->user()->id;
         $post->post_image = $fileNameToStore;
         $post->save();

         $post->tags()->sync($request->tags,false);

      //Save PostController
      return redirect()->route('posts.index');
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
      $tags = Tag::all();
      return view('manage.posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
          'title' => 'required|max:255',
          'category_id' => 'required|integer',
          'body' => 'required|min:20',
          'post_image' => 'image|nullable|max:1999'
      ]);

      // Handle File Upload
      if($request->hasFile('post_image')){
        //Get file
        $image = $request->file('post_image');
        //Get tile name with the extension
        $filenameWithExt = $request->file('post_image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('post_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //File Store Location
        $location = public_path('images/post_images/' . $fileNameToStore);
        //Upload Image
        Image::make($image)->resize(800, 400)->save($location);
        /*NEED TO FIX OLD FILE DELETE ON UPDATE
        */
        //OLD fileNameToStore
        //$oldFilename = $post->image;
        //Update Post Object
        $post->post_image = $fileNameToStore;
        //Delete Old Image
        //Storage::delete('post_images/'.$oldFilename);
      }

      //Update Post Setting Variables
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        //$post->body = Purifier::clean($request->body, 'youtube');
        $post->body = $request->input('body');

        $post->save();
        $post->tags()->sync($request->tags,true);

      //Save PostController
      return redirect()->route('posts.show', $post->id);
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

   /*API CHECK FOR UNIQUE SLUG*/
   public function apiCheckUnique(Request $request)
   {
      return json_encode(!Post::where('slug', '=', $request->slug)->exists());
   }
}
