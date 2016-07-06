<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblVaccineHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('tblvaccinehistory')){
        Schema::drop('tblvaccinehistory');
      }

      Schema::create('tblvaccinehistory', function (Blueprint $table) {
          $table->increments('vHistoryId');
          $table->integer('petId')->unsigned();
          $table->integer('vaccineId')->unsigned();
          $table->date('date');
          $table->date('boosterDate');
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('petId')->references('petId')->on('tblPet');
          $table->foreign('vaccineId')->references('vaccineId')->on('tblVaccine');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('tblvaccinehistory');
    }
}
