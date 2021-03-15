<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id('leave_id')->autoIncrement();
            $table->string('name');
            $table->string('payment_type');
            $table->integer('days');
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')
                    ->references('policy_id')
                    ->on('policies')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leaves', function (Blueprint $table) {
            Schema::drop('leaves');
        });
    }
}
