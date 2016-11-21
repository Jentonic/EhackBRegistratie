<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsPendingInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('pendingInvites', function (Blueprint $table) {
          $table->foreign('teamID')->references('id')->on('teams')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('pendingInvites', function (Blueprint $table) {
          $table->dropForeign(['teamID']);
      });
    }
}
