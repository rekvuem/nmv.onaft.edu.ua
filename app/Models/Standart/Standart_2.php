<?php

namespace App\Models\Standart;

use Illuminate\Database\Eloquent\Model;

class Standart_2 extends Model {

  public $timestamps = false;
  protected $table = "standart_2";
  protected $fillable = [
    'standart_1_id', 'title_second',
  ];
  protected $hidden = [
  ];

  public function standart_3(){
    return $this->hasMany(Standart_3::class, 'standart_2_id');
  }
  
  public function belongTo1() {
    return $this->belongsTo(Standart_1::class);
  }

}
