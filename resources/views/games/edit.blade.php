@extends('layouts.main')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $game->name }}</h1>
    <form action="/games/update/{{ $game->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
      <label for="image">Imagem do jogo:</label>
      <img src="/img/games/{{ $game->image }}" alt="{{ $game->name }}" class="img-preview">
      <input value="/img/games/{{ $game->image }}" type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Nome do jogo:</label>
      <input required type="text" class="form-control" id="name" name="name" value="{{$game->name}}">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea required name="description" id="description" class="form-control">{{$game->description}}</textarea>
    </div>
        <input required type="submit" class="btn btn-primary" value="Editar jogo">
    </form>
</div>

@endsection