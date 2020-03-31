@extends('layouts.app')

@section('content')
  @foreach ($posts as $post)
    <div class="">
      <h2><a href="{{route('show', $post->id)}}">{{$post['title']}} di {{$post->user->name}}</a></h2>
      <p>Corpo: {{$post['body']}}</p>
      <img src="{{$post['photo_path']}}" alt="">
      <h6>Tags: @foreach ($post->tags as $tag)<p>{{$tag->tag}}</p> </h6> @endforeach
      <a href="{{route('show', $post->id)}}">Guarda e commenta </a>
    </div>

  @endforeach
@endsection
