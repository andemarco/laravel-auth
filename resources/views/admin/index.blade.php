@extends('layouts.app')

@section('content')
  <a href="{{route('admin.posts.create')}}">CREA NUOVO POST</a>
  @foreach ($posts as $post)

    <ul>
      <li>Titolo: {{$post['title']}}</li>
      <li>Corpo: {{$post['body']}}</li>
      <li>Foto: {{$post['photo_path']}}</li>
      <li>Autore: {{$post->user->name}}</li>
      <li><a href="{{route('admin.posts.edit', $post->id)}}">Modifica</a> </li>
      <li><a href="{{route('admin.posts.show', $post->id)}}">Guarda</a> </li>
      <li><form class="" action="{{route('admin.posts.destroy', $post)}}" method="post">
          <button type="submit" name="button">Cancella</button>
          @csrf
          @method('DELETE')
        </form></li>
    </ul>
  @endforeach

@endsection
