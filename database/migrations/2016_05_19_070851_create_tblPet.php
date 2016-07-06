<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('tblpet')){
        Schema::drop('tblpet');
      }

      Schema::create('tblpet', function (Blueprint $table) {
          $table->increments('petId');
          $table->integer('userId')->unsigned();
          $table->string('qrCode', 30);
          $table->string('petName', 20);
          $table->string('petType', 20);
          $table->string('breed', 30);
          $table->string('gender', 1);
          $table->string('dob')->nullable();
          $table->string('colour', 10);
          $table->boolean('isAdopted')->nullable();
          $table->integer('adoptedDate')->nullable();
          $table->string('status')->nullable();
          $table->boolean('isNeutralized')->nullable();
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('userId')->references('userId')->on('tblUser');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('tblpet');
    }
}
