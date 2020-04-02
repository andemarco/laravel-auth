@extends('layouts.app')

@section('content')
<h1>MODIFICA IL TUO NUOVO POST</h1>
<div class="container-form">
  <form class="" action="{{route('admin.posts.update', $post)}}" method="post">
    <label for="title">Inserisci Titolo</label>
    <input type="text" name="title" value="{{$post['title']}}">
    <label for="description">Inserisci Corpo Articolo</label>
    <textarea type="text" name="body" value="">{{$post['body']}}</textarea>
    <label for="img">Inserisci URL immagine</label>
    <input type="text" name="photo_path" value="{{$post['photo_path']}}">
    <small>oppure</small>
    <div class="">
      <label>Carica la tua immagine</label>
      <input type="file" name="path_image" value="{{$post->path_image}}" accept="image/">
    </div>
    @csrf
    @method('PATCH')
    <div class="">
      <h5>Inserisci TAG</h5>
      <label for="tags">Tags</label>
      @foreach ($tags as $tag)
      <div>
        <span>{{$tag->tag}}</span>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{($post->tags->contains($tag->id)) ? 'checked' : ''}}>
      </div>
      @endforeach
    </div>

    <button type="submit" name="button">Salva</button>
  </form>
</div>
@endsection
