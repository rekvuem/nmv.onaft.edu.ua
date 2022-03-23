<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
  public $timestamps = false;
  protected $table = "workers";
  protected $fillable = [
    'familia','imya','otchestvo','department','section','dolzhnost','telefon','email',
  ];
  protected $hidden = [
  ];


}
