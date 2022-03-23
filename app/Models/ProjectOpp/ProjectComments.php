<?php

namespace App\Models\ProjectOpp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectComments extends Model {

  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $table = "projectopp_comment";
  protected $fillable = [
    'projectopp_category_id', 'projectopp_file_id', 'username', 'comment_text', 'comment_parent_id'
  ];
  protected $hidden = [
    'id_comment',
  ];

public function BelongToCategory(){
  return $this->belongsTo(ProjectCategory::class, 'projectopp_category_id', 'id_category');
}
  
}
