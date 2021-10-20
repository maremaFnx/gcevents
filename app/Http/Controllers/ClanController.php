<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\User;
use Alert;


class ClanController extends Controller
{

    public function index()
    {



        $search = request('search');

        if ($search) {

            $clans = Clan::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $clans = Clan::all();
        }

        return view('clans.clans', ['clans' => $clans, 'search' => $search]);
    }

    public function create()
    {
        $user = auth()->user();
        $clans = Clan::all();
        $u_id = $user->id;
        return view('clans.create', ['clans' => $clans, 'u_id' => $u_id]);
    }

    public function dashboard()
    {

        $user = auth()->user();
        $clans = Clan::all();
        $u_id = $user->id;
      

        return view(
            'clans/dashboard',
            ['clans' => $clans, 'u_id' => $u_id]
        );
    }
    public function store(Request $request)
    {

        $clan = new Clan;

        $clan->name = $request->name;
        $clan->city = $request->city;
        $clan->description = $request->description;

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/clans'), $imageName);

            $clan->image = $imageName;
        }

        $user = auth()->user();
        $clan->user_id = $user->id;
        $clan->owner_name = $user->name;


        $clan->save();

        return redirect('/clans')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $clan = Clan::findOrFail($id);

        return view('clans.show', ['clan' => $clan]);
    }


    public function destroy($id)
    {

        $clan = Clan::findOrFail($id);

        unlink(public_path("img/clans/{$clan->image}"));

        Alert::info('O clan deteltado!', 'O seu envento foi deletado por completo.');

        Clan::findOrFail($id)->delete();

        return redirect('clans/user/dashboard');
    }

    public function edit($id)
    {

        $user = auth()->user();

        $clan = Clan::findOrFail($id);

        if ($user->id != $clan->user_id) {
            return redirect('/clans/user/dashboard');
        }

        return view('clans.edit', ['clan' => $clan]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/clans'), $imageName);

            $data['image'] = $imageName;
        }

        Clan::findOrFail($request->id)->update($data);

        return redirect('/clans/user/dashboard')->with('msg', 'Clan editado com sucesso!');
    }
}
