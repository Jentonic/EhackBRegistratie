<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userRoles', function (Blueprint $table) {
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('roleID')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userRoles', function (Blueprint $table) {
            $table->dropForeign(['userID']);
            $table->dropForeign(['roleID']);
        });
    }
}
