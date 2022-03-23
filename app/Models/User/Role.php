<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

  public $timestamps = false;
  protected $table = "role_users";
  protected $fillable = [
    'user_id','user_departament_id','user_position_id'
  ];
  protected $hidden = [
  ];


}
