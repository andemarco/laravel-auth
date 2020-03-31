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
    @csrf
    @method('PATCH')
    <button type="submit" name="button">Salva</button>
  </form>
</div>
@endsection
