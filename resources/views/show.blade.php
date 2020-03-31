@extends('layouts.app')

@section('content')
    <div class="">
      <h2>{{$post['title']}} di {{$post->user->name}}</h2>
      <p>Corpo: {{$post['body']}}</p>
      <img src="{{$post['photo_path']}}" alt="">
      <h6>Tags: @foreach ($post->tags as $tag)<p>{{$tag->tag}}</p> </h6> @endforeach
      <h6>Commenti:</h6>
        @foreach ($post->comment as $comment)
      <ul>
        <li>{{$comment['text']}}<br>
        Del giorno: {{$comment['created_at']}}</li>
      </ul>
        @endforeach
      <form class="" action="{{route('comment', $post->id)}}" method="post">
        <input name="text" rows="8" cols="80"></input>
        <button class="btn btn-primary"type="submit" name="button">Commenta</button>
        @csrf
        @method('POST')
      </form>
    </div>
@endsection
