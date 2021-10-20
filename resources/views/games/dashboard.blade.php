@extends('layouts.main')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Jogos que você cadastrou</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($games) > 0)
    <table class="table">
        @foreach($games as $game)
        @if($game->user_id == $u_id)
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td><a href="/games/{{ $game->id }}">{{ $game->name}}</a></td>
                <td>
                    <a href="/games/edit/{{ $game->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="/games/{{ $game->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @else
           
            @endif
            @endforeach
        </tbody>
    </table>
    @else
    @endif
</div>


@endsection