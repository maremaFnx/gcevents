<?php

namespace Database\Seeders;
use App\Models\Game;
use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Counter Strike: Global Ofensive',
            'description' => 'Jogo de ação em primeira pessoa!',
            'image' => 'gameseeder.png',
            'user_id' => '1',
            'owner_name' => 'Erasmo Carlos'
        ]);
    }
}
