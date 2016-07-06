<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('tbluser')){
        Schema::drop('tbluser');
      }

      Schema::create('tbluser', function (Blueprint $table) {
          $table->increments('id');
          $table->string('email', 100)->unique();
          $table->string('firstName', 50);
          $table->string('lastName', 50);
          $table->string('address_st', 50);
          $table->string('address_sub', 50)->nullable();
          $table->string('address_city', 50);
          $table->string('address_compl', 50);
          $table->integer('postcode');
          $table->integer('phone');
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
      Schema::drop('tbluser');
    }
}
