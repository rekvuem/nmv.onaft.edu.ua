<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsImg extends Model {

  protected $table = "news_imgs";
  protected $fillable = [
    'news_show_id', 'datefolder', 'filename', 'mime_type',
  ];
  protected $hidden = [
  ];

  public function newsshow() {
    return $this->belongsTo(NewsShow::class);
  }

}
