@extends('layouts.main')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meu Clan</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($clans) > 0)
    <table class="table">
        @foreach($clans as $clan)
        @if($clan->user_id == $u_id)
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
                <td><a href="/clans/{{ $clan->id }}">{{ $clan->name}}</a></td>
                <td>
                    <a href="/clans/edit/{{ $clan->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="/clans/{{ $clan->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @else
            <p>Você ainda não tem um clan, <a href="/clans/create">criar clan</a></p>
            @endif
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem um clan, <a href="/clans/create">criar clan</a></p>
    @endif
</div>


@endsection