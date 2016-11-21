<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('password')->nullable();
            $table->boolean('hasRole')->default(false);
            $table->boolean('hasTeam')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('confirmationToken')->nullable();
            $table->string('reminderMail')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
