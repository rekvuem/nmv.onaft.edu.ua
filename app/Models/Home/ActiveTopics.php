<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class ActiveTopics extends Model
{
  public $timestamps = false;
  protected $table = "active_diploms_topics";
  protected $fillable = [
    'title',
  ];
  protected $hidden = [
  ];

  public function ActiveSpecial() {
    return $this->belongsToMany(ActiveSpecial::class);
  }
}
