<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->boolean('status');
            $table->timestamp('start_time', 0)->nullable();
            $table->timestamp('end_time', 0)->nullable();
            $table->unsignedBigInteger('reason_id')->nullable();
            $table->foreign('reason_id')
                    ->references('reason_id')
                    ->on('reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            Schema::drop('attendances');
        });
    }
}
