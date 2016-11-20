<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsTeamUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('teamUsers', function (Blueprint $table) {
          $table->foreign('teamID')->references('id')->on('teams')->onDelete('cascade');
          $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('teamUsers', function (Blueprint $table) {
          $table->dropForeign(['userID']);
          $table->dropForeign(['teamID']);
      });
    }
}
