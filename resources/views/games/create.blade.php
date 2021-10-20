@extends('layouts.main')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre um jogo</h1>
  <form action="/games/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem do jogo:</label>
      <input required type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Nome do jogo:</label>
      <input required type="text" class="form-control" id="name" name="name" placeholder="Nome do jogo">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea required name="description" id="description" class="form-control" placeholder="Como é o jogo?"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar jogo">
  </form>
</div>
@endsection