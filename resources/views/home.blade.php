@extends('layouts.app')

@section('content')
  @foreach ($posts as $post)
    <div class="box">
      <h2><a href="{{route('show', $post->id)}}">{{$post['title']}}</a></h2> <br>
        <span><a href="{{route('show', $post->id)}}">{{$post->user->name}}</a></span>
      <p>{{$post['body']}}</p>
      <img src="{{(is_null($post->path_image) ? $post->photo_path : asset('storage/' . $post->path_image))}}" alt="">
      <h6>{{($post->tags->isEmpty()) ? '' : 'HANNO COLLABORATO:'}}     </h6>
        @foreach ($post->tags as $tag)
          <p>{{$tag->tag}}</p>
        @endforeach
      <a href="{{route('show', $post->id)}}">Guarda e commenta </a>
    </div>
  @endforeach
@endsection
