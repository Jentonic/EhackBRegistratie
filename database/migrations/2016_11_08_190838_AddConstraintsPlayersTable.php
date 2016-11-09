<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('players', function (Blueprint $table) {
          $table->foreign('teamid')->references('id')->on('teams')->onDelete('cascade');
          $table->foreign('userid')->references('id')->on('registrations')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('players', function (Blueprint $table) {
          $table->dropForeign('players_teamid_foreign');
          $table->dropForeign('players_userid_foreign');
      });
    }
}
