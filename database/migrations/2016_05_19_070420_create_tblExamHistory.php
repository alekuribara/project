<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblExamHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('tblexamhistory')){
        Schema::drop('tblexamhistory');
      }

      Schema::create('tblexamhistory', function (Blueprint $table) {
          $table->increments('eHistoryId');
          $table->integer('petId')->unsigned();
          $table->integer('examId')->unsigned();
          $table->date('date');
          $table->string('result' ,10);
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('petId')->references('petId')->on('tblPet');
          $table->foreign('examId')->references('examId')->on('tblExam');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('tblexamhistory');
    }
}
