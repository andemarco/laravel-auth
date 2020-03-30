@extends('layouts.app')

@section('content')
    <ul>
      <li>Titolo: {{$post['title']}}</li>
      <li>Corpo: {{$post['body']}}</li>
      <li>Foto: {{$post['photo_path']}}</li>
      <li>Autore: {{$post->user->name}}</li>
    </ul>
@endsection
