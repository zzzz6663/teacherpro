<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('count')->default('0');
            $table->string('active')->default('0');
            $table->string('submit')->default('0');
            $table->enum('sex',['male','female']);
            $table->string('country')->nullable();
            $table->string('level')->nullable();
            $table->string('info')->nullable();
            $table->string('sky_id')->nullable();
            $table->text('bio')->nullable();
            $table->text('lang')->nullable();
            $table->string('cash')->default('eyJpdiI6Ii9CdVdOK2wwWUJzT25ScnpubkFocFE9PSIsInZhbHVlIjoiZkN1NkFVeWJsNEtKcHpvcU9sSFMvUT09IiwibWFjIjoiMGI2YTg1NDlhYmE4YmYyYjU5YTA4MGI2NWRjY2RiMjg5MTU5YmU1ZjRjODE3MzQ0ODQ2NDFmNjgwZGNkMjE0OCJ9');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
