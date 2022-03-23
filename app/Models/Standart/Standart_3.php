<?php

namespace App\Models\Standart;

use Illuminate\Database\Eloquent\Model;

class Standart_3 extends Model {

  public $timestamps = false;
  protected $table = "standart_3";
  protected $fillable = [
    'standart_2_id', 'title', 'filename',
  ];
  protected $hidden = [
  ];

  public function belongTo2() {
    return $this->belongsTo(Standart_2::class);
  }

}
