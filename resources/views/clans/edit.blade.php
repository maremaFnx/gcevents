@extends('layouts.main')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $clan->name }}</h1>
    <form action="/clans/update/{{ $clan->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
      <label for="image">Imagem do clan:</label>
      <img src="/img/clans/{{ $clan->image }}" alt="{{ $clan->title }}" class="img-preview">
      <input required type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Nome do clan:</label>
      <input required type="text" class="form-control" id="name" name="name" value="{{$clan->name}}">
    </div>
    <div class="form-group">
      <label for="title">Cidade:</label>
      <input required type="text" class="form-control" id="city" name="city" value="{{$clan->city}}">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea required name="description" id="description" class="form-control">{{$clan->description}}</textarea>
    </div>
        <input required type="submit" class="btn btn-primary" value="Editar clan">
    </form>
</div>

@endsection