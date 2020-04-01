@extends('layouts.app')

@section('content')
<h1>CREA IL TUO NUOVO POST</h1>
<div class="container-form">
  <form class="" action="{{route('admin.posts.store')}}" method="post">
    <label for="title">Inserisci Titolo</label>
    <input type="text" name="title" value="">
    <label for="description">Inserisci Corpo Articolo</label>
    <textarea type="text" name="body" value=""></textarea>
    <label for="img">Inserisci URL immagine</label>
    <input type="text" name="photo_path" value="">
    @csrf
    @method('POST')
    <div class="">
      <h5>Inserisci TAG</h5>
      <label for="tags">Tags</label>
      @foreach ($tags as $tag)
      <div>
        <span>{{$tag->tag}}</span>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}">
      </div>
      @endforeach
    </div>

    <button type="submit" name="button">Salva</button>
  </form>
</div>
@endsection
