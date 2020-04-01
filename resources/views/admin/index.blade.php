@extends('layouts.app')

@section('content')
  <h1>I TUOI POST</h1>
  @foreach ($posts as $post)

    <div class="box">

      <h2>TITOLO: {{$post['title']}}</h2>
      <p>Corpo: {{$post['body']}}</p>
      <p>Path immagine: {{$post['photo_path']}}</p>
      <p>Tags:<br> @foreach ($post->tags as $tag){{$tag->tag}}</p> @endforeach
      <a href="{{route('admin.posts.edit', $post->id)}}">Modifica</a><br>
      <a href="{{route('admin.posts.show', $post->id)}}">Anteprima</a>
      <form class="" action="{{route('admin.posts.destroy', $post)}}" method="post">
        <button type="submit" name="button">Cancella</button>
          @csrf
          @method('DELETE')
      </form>
      <div class="">
        <h3>Commenti:</h3>
          @foreach ($post->comment as $comment)
        <ul class="comment">
          <li>{{$comment['text']}} - <small>{{$comment['created_at']}}</small></li>
        </ul>
            @endforeach
      </div>
    </div>
  @endforeach

@endsection
