<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model {

  public $timestamps  = false;
  protected $table    = "user_departament";
  protected $fillable = [
    'title_departament', 'slug'
  ];
  protected $hidden   = [
  ];

//  public function SlugDepart1() {
//    return $this->belongsToMany(Models\User\Role::class, 'role_users', 'id', 'user_departament_id');
//  }
//
//  public function users() {
//    return $this->belongsTo(\App\User::class);
//  }

}
