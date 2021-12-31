<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('meet_id')->default(null);
            $table->unsignedBigInteger('com')->default(0);
            $table->string('amount');
            $table->string('bank')->nullable();
            $table->string('transactionId');
            $table->string('type');
            $table->string('status')->default('0');
            $table->string('count')->default('0');
            $table->string('remain')->default(null);
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
        Schema::dropIfExists('bills');
    }
}
