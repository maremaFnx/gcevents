<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'title' => 'Campeonato de CSGO!',
            'description' => 'Pipoco do maior!',
            'image' => 'majorseeder.png',
            'user_id' => '1',
            'game_id' => '1',
            'items' => ['Cadeiras, Palco'],
            'city' => 'Xaxim',
            'private' => 0,
            'number' => '+55 (49) 9-9852-4745',
            'date' => '2021-10-01'
        ]);
    }
}
