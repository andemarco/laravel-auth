<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
      $post = Post::find($id);
      $idPost = $post->id;
      $data = $request->all();

      $newComment = new Comment;
      $newComment->text = $data['text'];
      $newComment->post_id = $idPost;

      $newComment->save();

      return redirect()->route('home');
    }
}
