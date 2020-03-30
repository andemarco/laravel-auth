@extends('layouts.app')

@section('content')
<h1>CREA IL TUO NUOVO POST</h1>
<div class="form">
  <form class="" action="{{route('admin.posts.store')}}" method="post">
    <label for="title">Inserisci Titolo</label>
    <input type="text" name="title" value="">
    <label for="description">Inserisci Corpo Articolo</label>
    <textarea type="text" name="body" value=""></textarea>
    <label for="img">Inserisci URL immagine</label>
    <input type="text" name="photo_path" value="">
    <button type="submit" name="button">Inserisci</button>
    @csrf
    @method('POST')
  </form>
</div>
@endsection
