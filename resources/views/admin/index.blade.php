@extends('layouts.app')

@section('content')
  <h1>I TUOI POST</h1>
  @foreach ($posts as $post)

    <div class="">

      <ul>
        <li><h2>TITOLO: {{$post['title']}}</h2>
        <ul>
          <li><p>Corpo: {{$post['body']}}</p></li>
          <li><p>Path immagine: {{$post['photo_path']}}</p></li>
          <h6>Tags: @foreach ($post->tags as $tag)<p>{{$tag->tag}}</p> </h6> @endforeach
          <li><a href="{{route('admin.posts.edit', $post->id)}}">Modifica</a></li>
          <li><a href="{{route('admin.posts.show', $post->id)}}">Anteprima</a></li>
          <li><form class="" action="{{route('admin.posts.destroy', $post)}}" method="post">
              <button type="submit" name="button">Cancella</button>
              @csrf
              @method('DELETE')
          </form></li>
        </ul>
        <div class="">
          <h3>Commenti:</h3>
            @foreach ($post->comment as $comment)
          <ul>
            <li>{{$comment['text']}}<br>
            Del giorno: {{$comment['created_at']}}</li>
          </ul>
            @endforeach
        </div></li>
      </ul>

    </div>
  @endforeach

@endsection
