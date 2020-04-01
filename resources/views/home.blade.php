@extends('layouts.app')

@section('content')
  @foreach ($posts as $post)
    <div class="box">
      <h2><a href="{{route('show', $post->id)}}">{{$post['title']}}</a></h2> <br>
        <span><a href="{{route('show', $post->id)}}">{{$post->user->name}}</a></span>
      <p>Corpo: {{$post['body']}}</p>
      <img src="{{$post['photo_path']}}" alt="">
      <h6>Tags:
        <p>
          @foreach ($post->tags as $tag)
          {{$tag->tag}}
        @endforeach
        </p>
      </h6>
      <a href="{{route('show', $post->id)}}">Guarda e commenta </a>
    </div>
  @endforeach
@endsection
