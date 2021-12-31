<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MeetCountUserClassToTeachersRel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counts', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('count');
            $table->string('price')->nullable();
            $table->string('com')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('counts', function (Blueprint $table) {
            //
        });
    }
}
