<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsActivitiesRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('activities_registrations', function (Blueprint $table) {
          $table->foreign('activitiesid')->references('id')->on('activities')->onDelete('cascade');
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
          $table->dropForeign('activities_registrations_activitiesid_foreign');
          $table->dropForeign('activities_registrations_userid_foreign');
      });
    }
}
