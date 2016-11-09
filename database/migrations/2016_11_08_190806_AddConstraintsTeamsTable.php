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
          $table->foreign('userid')->references('id')->on('registrations')->onDelete('cascade');
          $table->foreign('gameid')->references('id')->on('games')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('polls', function (Blueprint $table) {
          $table->dropForeign('teams_userid_foreign');
          $table->dropForeign('teams_gameid_foreign');
      });
    }
}
