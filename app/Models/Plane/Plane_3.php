<?php

namespace App\Models\Plane;

use Illuminate\Database\Eloquent\Model;

class Plane_3 extends Model
{
  public $timestamps = false;
  protected $table = "plane_3";
  protected $fillable = [
    'plane_2_id', 'title_predmet',
  ];
  protected $hidden = [
    'rowid'
  ];

  public function planeBelongPlane() {
    return $this->belongsToMany(Plane_2::class);
  }

  public function plane_4() {
    return $this->hasMany(Plane_4::class);
  }
}
