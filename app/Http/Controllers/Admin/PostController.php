<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::where('user_id', Auth::id())->get();

      return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::all();

      $data = [
        'tags'=>$tags,
      ];

      return view ('admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //   'path_image'=> 'image'
        // ]);

        $idUser = Auth::user()->id;
        $nameUser = Auth::user()->name;
        $data = $request->all();

        if (!empty($data['tags'])) {
          $tags = $data['tags'];
        }
        if (!empty($data['path_image'])) {
          $path = Storage::disk('public')->put('images', $data['path_image']);
        }
        $newPost = new Post;
        $newPost->title = $data['title'];
        $newPost->body = $data['body'];
        $newPost->photo_path = $data['photo_path'];
        $newPost->user_id = $idUser;
        if (!empty($data['path_image'])) {
          $newPost->path_image = $path;;
        }

        $saved = $newPost->save();


        if(!$saved) {
            return redirect()->back();
        }

        $tags = $data['tags'];
        if(!empty($tags)) {
            $newPost->tags()->attach($tags);
        }

        return redirect()->route('admin.posts.index');
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

      if(empty($post))
        {
          abort(404);
        }

      return view('admin.show', compact('post'));
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
      $tags = Tag::all();

      $data = [
        'post'=>$post,
        'tags'=>$tags,
      ];

      return view('admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $idUser = Auth::user()->id;

      if(empty($post)){
          abort(404);
      }

      if($post->user->id != $idUser){
          abort(404);
      }

      $nameUser = Auth::user()->name;

      $data = $request->all();
      
      $post->title = $data['title'];
      $post->body = $data['body'];
      $post->photo_path = $data['photo_path'];
      $post->user_id = $idUser;

      $post->update();



      $tags = $data['tags'];
      $post->tags()->sync($tags);


      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

      if(empty($post)) {
        abort(404);
      }

      $post->tags()->detach();
      $post->delete();
      return redirect()->route("admin.posts.index");
    }
}
