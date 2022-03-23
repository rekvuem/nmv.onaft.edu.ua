<?php

namespace App\Models\Certifacat;

use Illuminate\Database\Eloquent\Model;

class Cert_3 extends Model {

  public $timestamps = false;
  protected $table = "certification_3";
  protected $fillable = [
    'certification_2_id', 'title_third',
  ];
  protected $hidden = [
  ];

  public function certif4() {
    return $this->hasMany(Cert_4::class, 'certification_3_id');
  }

  public function CertifBelong2() {
    return $this->belongsToMany(Cert_2::class);
  }

}
