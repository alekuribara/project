<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('tblexam')){
        Schema::drop('tblexam');
      }

      Schema::create('tblexam', function (Blueprint $table) {
          $table->increments('examId');
          $table->string('name', 100);
          $table->string('requirement')->nullable();
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
      Schema::drop('tblexam');
    }
}
