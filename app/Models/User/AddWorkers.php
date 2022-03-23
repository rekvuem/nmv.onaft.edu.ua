<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AddWorkers extends Model
{
  public $timestamps = false;
  protected $table = "workers";
  protected $fillable = [
    'familia','imya','otchestvo','foto','foto_type','department','section','dolzhnost','telefon','email',
  ];
  protected $hidden = [
  ];
}
