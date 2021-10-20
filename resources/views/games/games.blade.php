@extends('layouts.main')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um jogo</h1>
    <form action="/games" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Jogos cadastrados:</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($games as $game)
        <div class="card col-md-3">
            <div id="clan-card">

                <img src="/img/games/{{ $game->image }}" alt="{{ $game->name }}">
                <div style="margin-left: 10px;">
                    <h5 class="card-title">{{ $game->name }}</h5>
                    <a href="/games/{{ $game->id }}" class="btn btn-primary">Saber mais</a>
                </div>

            </div>
        </div>
        @endforeach
        @if(count($games) == 0 && $search)
        <p>Não foi possível encontrar nenhum jogo com {{ $search }}! <a href="/games">Ver todos</a></p>
        @elseif(count($games) == 0)
        <p>Não há jogos cadastrados</p>
        @endif
    </div>
</div>

@endsection