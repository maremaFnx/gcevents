@extends('layouts.main')

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/games/{{ $game->image }}" class="img-fluid" alt="{{ $game->name }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $game->name }}</h1>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $game->owner_name }}</p>
        <h3>Sobre o jogo:</h3>
        <p class="event-description">{{ $game->description }}</p>
      </div>
    </div>
  </div>


@endsection