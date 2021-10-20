@extends('layouts.main')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie o seu Clan</h1>
  <form action="/clans/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem do clan:</label>
      <input required type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Nome do clan:</label>
      <input required type="text" class="form-control" id="name" name="name" placeholder="Nome do clan">
    </div>
    <div class="form-group">
      <label for="title">Cidade:</label>
      <input required type="text" class="form-control" id="city" name="city" placeholder="Cidade do Clan">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea required name="description" id="description" class="form-control" placeholder="O que é seu clan?"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Clan">
    <!-- @foreach($clans as $clan)
    @if($clan->user_id == $u_id)
    <p>Você só pode ter um clan.</p>
    @else 
    @endif
    @endforeach -->
  </form>
</div>
@endsection