<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'email'=>'kamiel.klumpers@student.ehb.be',
                'firstname'=>'Kamiel',
                'lastname'=>'Klumpers',
                'password'=>bcrypt('secret'),
                'hasRole'=>false,
                'confirmed'=>true,
            ],
            [
                'email'=>'eli.boey@student.ehb.be',
                'firstname'=>'Eli',
                'lastname'=>'Boey',
                'password'=>bcrypt('secret'),
                'hasRole'=>false,
                'confirmed'=>true,
            ]
        );
    }
}
