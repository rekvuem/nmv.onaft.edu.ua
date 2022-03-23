<?php

namespace App\Models\ProjectOpp;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    
//  public $timestamps = false;
  protected $table = "projectopp_upload_file";

 protected $fillable = [
   'projectopp_category_id', 'folder', 'title','filename','size','mime_type'
   ];
 
   protected $hidden = [
    'id_upload_file',
  ]; 
  
} 