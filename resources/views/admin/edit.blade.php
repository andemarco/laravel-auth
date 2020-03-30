@extends('layouts.app')

@section('content')
  <h1>MODIFICA IL POST "{{$post['title']}}"</h1>
<div class="form">
  <form class="" action="{{route('admin.posts.update', $post)}}" method="post">
    <label for="title">Inserisci Titolo</label>
    <input type="text" name="title" value="{{$post['title']}}">
    <label for="description">Inserisci Corpo Articolo</label>
    <textarea type="text" name="body" value="">{{$post['body']}}</textarea>
    <label for="img">Inserisci URL immagine</label>
    <input type="text" name="photo_path" value="{{$post['photo_path']}}">
    <button type="submit" name="button">Inserisci</button>
    @csrf
    @method('PATCH')
  </form>
</div>
@endsection
