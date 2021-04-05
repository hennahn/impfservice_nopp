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
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('sex', ['m', 'w', 'd']);
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('ssno', 10)->unique();

            $table->string('street')->nullable();
            $table->string('zipCode', 4)->nullable();
            $table->string('houseNo')->nullable();
            $table->string('city')->nullable();

            $table->boolean('isAdmin')->default(false);
            $table->boolean('status')->default(false);

            $table->rememberToken();

            $table->foreignId('vaccination_id')->nullable();

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
