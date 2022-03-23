<?php

namespace App\Models\Lectures;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model {

  public $timestamps = false;
  protected $table = "lecture_onapt";
  protected $guarded = ['*'];
  protected $dates = ['hours', 'plane_start'];
  protected $fillable = [
  ];
  protected $hidden = [
  ];
  protected $casts = [
    'plane_start' => 'date',
    'hours'=>'time',
  ];

}
