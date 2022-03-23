<?php

namespace App\Models\Certifacat;

use Illuminate\Database\Eloquent\Model;

class Cert_4 extends Model {

  protected $table = "certification_4";
  protected $fillable = [
    'certification_3_id', 'title_four', 'filename',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];

  public function CertifBelong3() {
    return $this->belongsToMany(Cert_3::class);
  }

}
