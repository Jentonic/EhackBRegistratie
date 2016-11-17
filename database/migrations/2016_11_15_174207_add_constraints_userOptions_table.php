<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsUserOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userOptions', function (Blueprint $table) {
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('optionID')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userOptions', function (Blueprint $table) {
            $table->dropForeign(['optionID']);
            $table->dropForeign(['userID']);
        });
    }
}
