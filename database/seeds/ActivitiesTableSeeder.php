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
      DB::table('activityGroups')->insert([
          [
              'name' => 'Test',
              'maxUsers' => '5',
              'description' => 'Testing hier zo',
              'startDate' => date(),
              'endDate' => date(),
              'activityGroupID' => '1',
          ]
      ]);
    }
}
