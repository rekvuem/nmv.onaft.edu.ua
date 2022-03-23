<?php

namespace App\Models\Opp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OppSpecial extends Model {
  
  use SoftDeletes;
  
  protected $table = "opp_specials";

 protected $fillable = [
   'type_opp', 'type', 'status_donwload', 'num', 'specialization',
   ];
 
   protected $hidden = [
    'deleted_at',
  ];

  public function oppupl(){
    return $this->hasMany(OppUpload::class);
  }

}
