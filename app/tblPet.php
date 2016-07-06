<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblPet extends Model
{
  protected $connection = 'mysql';
  protected $table = 'tblpet';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        'id',
       'qrCode',
       'petName',
       'petType',
       'breed',
       'gender',
       'dob',
       'colour',
       'isAdopted',
       'adoptedDate',
       'status',
       'isNeutralized',
       'picturePath'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];
}
