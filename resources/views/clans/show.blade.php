@extends('layouts.main')

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/clans/{{ $clan->image }}" class="img-fluid" alt="{{ $clan->name }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $clan->name }}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $clan->city }}</p>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $clan->owner_name }}</p>
    
        <h3>Sobre o clan:</h3>
        <p class="event-description">{{ $clan->description }}</p>
      </div>
    </div>
  </div>


@endsection