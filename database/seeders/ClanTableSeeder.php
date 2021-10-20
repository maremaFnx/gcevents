<?php

namespace Database\Seeders;

use App\Models\Clan;
use Illuminate\Database\Seeder;

class ClanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clan::create([
            'name' => 'Godsent',
            'description' => 'Alguma coisa e tal!',
            'image' => 'godseeder.png',
            'user_id' => '1',
            'owner_name' => 'Erasmo Carlos',
            'city' => 'Xaxim'
        ]);
    }
}
