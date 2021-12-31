<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('com')->default(0);
            $table->string('type')->default('pay');
            $table->string('t_click')->default('0');
            $table->string('s_click')->default('0');
            $table->string('active')->default('1');
            $table->string('canceled')->default('0');
            $table->string('status')->default('no_reserved');
            $table->timestamp('start')->nullable();
            $table->string('pair')->nullable();
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
        Schema::dropIfExists('meets');
    }
}
