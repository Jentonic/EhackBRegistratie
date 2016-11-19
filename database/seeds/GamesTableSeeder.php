<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
            'name'=>'League of Legends',
            'isSinglePlayer'=>false,
            'maxPlayers'=>5,
            'MaxTeams'=>14
            ],
            [
            'name'=>'Counter Strike Global Offensive',
            'isSinglePlayer'=>false,
            'maxPlayers'=>5,
            'MaxTeams'=>14
            ],
            [
            'name'=>'Hearthstone',
            'isSinglePlayer'=>true,
            'maxPlayers'=>1,
            'MaxTeams'=>30
            ]
        ]);
    }
}
