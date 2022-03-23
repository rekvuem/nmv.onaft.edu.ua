<?php

namespace App\Models\Opp;

use Illuminate\Database\Eloquent\Model;

class OppUpload extends Model {

  protected $table = 'opp_upload';
  protected $fillable = [
    'opp', 'status_donwload', 'specialization', 'FileUploadOPP', 'year', 'opp_special_id', 'filename'
  ];

  protected $hidden = [
    'addspecial',
  ];

  public function oppspec() {
    return $this->belongsToMany(OppSpecial::class);
  }

}
