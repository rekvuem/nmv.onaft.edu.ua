<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class RoleFunctin extends Model {

  public $timestamps = false;
  protected $table = "role_function";
  protected $fillable = [
  ];
  protected $hidden = [
  ];

  public function SlugsFunction() {
    return $this->belongsToMany(Role::class, 'role_users', 'id');
  }

}
