<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblExamHistory extends Model
{
  protected $connection = 'mysql';
  protected $table = 'tblexamhistory';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        'petId'
      , 'examId'
      , 'date'
      , 'result'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];
}
