<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblExam extends Model
{
  protected $connection = 'mysql';
  protected $table = 'tblexam';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        'name'
      , 'requirement'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];
}
