<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('activities')->insert([
          [
              'name' => 'Test',
              'maxUsers' => '5',
              'description' => 'Testing hier zo',
              'activityGroupID' => '1',
          ]
      ]);
    }
}
