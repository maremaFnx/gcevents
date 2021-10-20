@extends('layouts.main')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um clan</h1>
    <form action="/clans" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Conheça os Clans da GC:</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($clans as $clan)
        <div class="card col-md-3">
            <div id="clan-card">

                <img src="/img/clans/{{ $clan->image }}" alt="{{ $clan->name }}">
                <div style="margin-left: 10px;">
                    <h5 class="card-title">{{ $clan->name }}</h5>
                    <a href="/clans/{{ $clan->id }}" class="btn btn-primary">Saber mais</a>
                </div>

            </div>
        </div>
        @endforeach
        @if(count($clans) == 0 && $search)
        <p>Não foi possível encontrar nenhum clan com {{ $search }}! <a href="/clans">Ver todos</a></p>
        @elseif(count($clans) == 0)
        <p>Não há clans cadastrados</p>
        @endif
    </div>
</div>

@endsection