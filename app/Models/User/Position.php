<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

  public $timestamps  = false;
  protected $table    = "user_position";
  protected $fillable = [
    'title_position', 'slug'
  ];
  protected $hidden   = [
  ];

//  public function SlugPosition1() {
//    return $this->belongsToMany(Models\User\Role::class, 'role_users', 'id', 'user_position_id');
//  }

}
