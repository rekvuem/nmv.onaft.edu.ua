<?php

namespace App\Models\ProjectOpp;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
  public $timestamps = false;
  protected $table = "projectopp_category";

 protected $fillable = [
   'slug', 'title', 'datecreate',
   ];
 
   protected $hidden = [
    'id_category',
  ]; 
   
   
   public function SumCommentProj(){
     return $this->hasMany(ProjectComments::class,'projectopp_category_id', 'id_category');
   }
   
   public function SumFileProj(){
     return $this->hasMany(ProjectFile::class,'projectopp_category_id', 'id_category');
   }
}
