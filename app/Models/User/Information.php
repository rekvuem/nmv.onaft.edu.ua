<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Information extends Model {

  use SoftDeletes;

  public $timestamps  = false;
  protected $dates = ['happy_birth'];
  protected $table    = "user_infos";
  protected $fillable = [
    'user_id', 'familia', 'imya', 'otchestvo', 'number_mobile', 'happy_birth', 'registration_ip',
  ];
  protected $hidden   = [
  ];

  public function userSelect() {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }
  
  public function UserSelectDepart(){
      return $this->belongsToMany(\App\User::class, 'role_user_departament', 'id','user_id');
  }
}