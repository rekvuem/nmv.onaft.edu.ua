<?php

namespace App\Models\Plane;

use Illuminate\Database\Eloquent\Model;

class Plane_2 extends Model {

  protected $table = "plane_2";
  protected $fillable = [
  ];
  protected $hidden = [
  ];

  public function planeBelong() {
    return $this->belongsToMany(Plane_1::class);
  }

  public function plane_3() {
    return $this->hasMany(Plane_3::class);
  }

}
