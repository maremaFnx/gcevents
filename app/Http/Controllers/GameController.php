<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\User;
use Alert;
use App\Models\Game;

class GameController extends Controller
{

    public function index()
    {



        $search = request('search');

        if ($search) {

            $games = Game::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $games = Game::all();
        }

        return view('games.games', ['games' => $games, 'search' => $search]);
    }

    public function create()
    {
        $user = auth()->user();
        $games = Game::all();
        $u_id = $user->id;
        return view('games.create', ['games' => $games, 'u_id' => $u_id]);
    }

    public function dashboard()
    {

        $user = auth()->user();
        $games = Game::all();
        $u_id = $user->id;
      

        return view(
            'games/dashboard',
            ['games' => $games, 'u_id' => $u_id]
        );
    }
    public function store(Request $request)
    {

        $game = new Game;

        $game->name = $request->name;
        $game->description = $request->description;

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/games'), $imageName);

            $game->image = $imageName;
        }

        $user = auth()->user();
        $game->user_id = $user->id;
        $game->owner_name = $user->name;


        $game->save();

        return redirect('/games')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $game = Game::findOrFail($id);

        return view('games.show', ['game' => $game]);
    }


    public function destroy($id)
    {

        $game = Game::findOrFail($id);

        unlink(public_path("img/games/{$game->image}"));

        Alert::info('O game deteltado!', 'O seu envento foi deletado por completo.');

        Game::findOrFail($id)->delete();

        return redirect('games/user/dashboard');
    }

    public function edit($id)
    {

        $user = auth()->user();

        $game = Game::findOrFail($id);

        if ($user->id != $game->user_id) {
            return redirect('/games/user/dashboard');
        }

        return view('games.edit', ['game' => $game]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/games'), $imageName);

            $data['image'] = $imageName;
        }

        Game::findOrFail($request->id)->update($data);

        return redirect('/games/user/dashboard')->with('msg', 'Jogo editado com sucesso!');
    }
}