<?php

namespace App\Models\Lectures;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  public $timestamps = false;
  protected $table = "lecture_teacher";
  protected $fillable = [
  ];
  protected $hidden = [
  ];
}
