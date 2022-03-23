<?php

namespace App\Models\Certifacat;

use Illuminate\Database\Eloquent\Model;

class Cert_1 extends Model {

  public $timestamps = false;
  protected $table = "certification_1";
  protected $fillable = [
  ];
  protected $hidden = [
  ];

  public function certif2() {
    return $this->hasMany(Cert_2::class, 'certification_1_id');
  }


}
