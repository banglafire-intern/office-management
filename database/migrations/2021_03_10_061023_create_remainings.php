<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemainings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remainings', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->unsignedBigInteger('leave_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remainings', function (Blueprint $table) {
            Schema::drop('remainigs');
        });
    }
}
