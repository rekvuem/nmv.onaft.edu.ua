<?php

namespace App\Models\Plane;

use Illuminate\Database\Eloquent\Model;

class Plane_4 extends Model {

  protected $table = "plane_4";
  protected $fillable = [
    'plane_3_id','title_file','filename','statuses',
  ];
  protected $hidden = [
  ];

  public function planeBelongTo() {
    return $this->belongsToMany(Plane_3::class);
  }

}
