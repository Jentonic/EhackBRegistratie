<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsOptionsRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('options_registrations', function (Blueprint $table) {
          $table->foreign('optionid')->references('id')->on('options')->onDelete('cascade');
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
          $table->dropForeign('options_registrations_optionid_foreign');
          $table->dropForeign('options_registrations_userid_foreign');
      });
    }
}
