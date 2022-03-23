<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class ActiveSpecial extends Model
{
  public $timestamps = false;
  protected $table = "active_diploms_special";
  protected $fillable = [
    'num','specialization','show'
  ];
  protected $hidden = [
  ];

  public function topicses() {
    return $this->hasMany(ActiveTopics::class,'id_dp_active','id_special');
  }
  

}
