<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingInvites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pendingInvites', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('teamID')->unsigned();
          $table->string('email');
          $table->string('token')->unique()->default('');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pendingInvites');
    }
}
