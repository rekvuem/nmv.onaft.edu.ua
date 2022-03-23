<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsShow extends Model {

  use SoftDeletes;

  protected $table    = "news_show";
  protected $fillable = [
    'title_news_uk', 
    'title_news_ru', 
    'title_news_en', 
    'title_slug', 
    'discription_uk',
    'discription_ru',
    'discription_en',
  ];
  protected $hidden   = [
  ];

  public function newsimg() {
    return $this->hasMany(NewsImg::class);
  }

}
