<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblVaccineHistory extends Model
{
  protected $connection = 'mysql';
  protected $table = 'tblvaccinehistory';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        'petId'
      , 'vaccineId'
      , 'date'
      , 'boosterDate'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];
}
