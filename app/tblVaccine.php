<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblVaccine extends Model
{
  protected $connection = 'mysql';
  protected $table = 'tblvaccine';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        'name'
      , 'company'
      , 'frequency'
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];
}
