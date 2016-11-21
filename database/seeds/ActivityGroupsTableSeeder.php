<?php

use Illuminate\Database\Seeder;

class ActivityGroupsTableSeeder extends Seeder
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
              'name'=>'Talks',
          ],
          [
              'name'=>'Create',
          ],
          [
              'name'=>'Hack',
          ],
          [
              'name'=>'Game',
          ]
      ]);
    }
}
