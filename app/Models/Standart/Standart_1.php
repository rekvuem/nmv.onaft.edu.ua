<?php

namespace App\Models\Standart;

use Illuminate\Database\Eloquent\Model;

class Standart_1 extends Model {

  public $timestamps = false;
  protected $table = "standart_1";
  protected $fillable = [
  ];
  protected $hidden = [
  ];

  public function standart_2() {
    return $this->hasMany(Standart_2::class, 'standart_1_id');
  }

}
