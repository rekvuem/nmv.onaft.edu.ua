<?php

namespace App\Models\Certifacat;

use Illuminate\Database\Eloquent\Model;

class Cert_2 extends Model {

  public $timestamps = false;
  protected $table = "certification_2";
  protected $fillable = [
    'certification_1_id', 'title_second',
  ];
  protected $hidden = [
  ];

  public function certif3() {
    return $this->hasMany(Cert_3::class, 'certification_2_id');
  }

  public function CertifBelong1() {
    return $this->belongsToMany(Cert_1::class);
  }

}
