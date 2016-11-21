<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('teams', function (Blueprint $table) {
          $table->foreign('leaderID')->references('id')->on('users');
          $table->foreign('gameID')->references('id')->on('games');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('teams', function (Blueprint $table) {
          $table->dropForeign(['leaderID']);
          $table->dropForeign(['gameID']);
      });
    }
}
