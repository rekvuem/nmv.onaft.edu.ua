<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model {

  public $timestamps  = false;
  protected $table    = "user_function";
  protected $fillable = [
    'title_function','slug',
  ];
  protected $hidden   = [
  ];
  
//  public function SlungRole(){
//    return $this->belongsToMany()
//  }
}
