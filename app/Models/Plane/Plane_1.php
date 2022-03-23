<?php

namespace App\Models\Plane;

use Illuminate\Database\Eloquent\Model;

class Plane_1 extends Model
{
  protected $table = "plane_1";
  protected $fillable = [
    
  ];
  protected $hidden = [
  ];

  public function plane_2() {
    return $this->hasMany(Plane_2::class);
  }

}
