<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('userActivities', function (Blueprint $table) {
          $table->foreign('userID')->references('id')->on('users');
          $table->foreign('activityID')->references('id')->on('activities');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('userActivities', function (Blueprint $table) {
          $table->dropForeign(['userID']);
          $table->dropForeign(['activityID']);
      });
    }
}
