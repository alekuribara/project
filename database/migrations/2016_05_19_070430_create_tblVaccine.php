<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblVaccine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('tblvaccine')){
        Schema::drop('tblvaccine');
      }

      Schema::create('tblvaccine', function (Blueprint $table) {
          $table->increments('vaccineId');
          $table->string('name', 100);
          $table->string('company', 100);
          $table->string('frequency', 10);
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
      Schema::drop('tblvaccine');
    }
}
