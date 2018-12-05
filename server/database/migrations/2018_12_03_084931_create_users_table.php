<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->bigIncrements('id')->unique();
          $table->string('username');
          $table->string('password');
          $table->timestamp('email_verified_at')->nullable();
          $table->string('firstname');
          $table->string('middlename');
          $table->string('lastname');
          $table->string('gender_id');
          $table->string('address');
          $table->bigInteger('Role_id');
          $table->bigInteger('district_id');
          $table->bigInteger('state_id');
          $table->bigInteger('country_id');
          $table->bigInteger('pincode');
          //$table->rememberToken();
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
