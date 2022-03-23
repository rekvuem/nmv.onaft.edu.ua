<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User\Functions;

//use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

  use Notifiable, SoftDeletes;

  /** добавить в use через запятую , SoftDeletes
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token', 'deleted_at'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /*   * ************************************************* */

  public function UserFirstInformation() {
    return $this->hasOne(Models\User\Information::class, 'user_id', 'id');
  }

  public function SlugDepart() {
    return $this->belongsToMany(Models\User\Departament::class, 'role_user_departament', 'user_id', 'user_departament_id');
  }

  public function SlugPosition() {
    return $this->belongsToMany(Models\User\Position::class, 'role_user_position', 'user_id', 'user_position_id');
  }

  public function RoleSuccess() {
    return $this->belongsToMany(Functions::class, 'role_function', 'user_id', 'user_function_id');
  }

  /*
   * Создано для определения сколько прав обладает пользователь
   * hasAnyRoles определяет несколько ролей
   * hasRole определяет 1 роль
   * roles() это значение отввечает за связь belongToMany
   */

  public function hasRoleSuccess($role) {
    if ($this->RoleSuccess()->whereIn('slug', $role)->first())
    {
      return true;
    }
    return false;
  }

  public function hasRolePos($role) {
    if ($this->SlugPosition()->where('slug', $role)->first())
    {
      return true;
    }
    return false;
  }

  public function hasRoleDep($role) {
    if ($this->SlugDepart()->where('slug', $role)->first())
    {
      return true;
    }
    return false;
  }

    public function hasChiefDepart($role) {
        if ($this->SlugPosition()->whereIn('slug', $role)->first())
        {
            return true;
        }
        return false;
    }
  
}
