<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UploadFiles
 *
 * @property int $id
 * @property string $page
 * @property string $side
 * @property string $title
 * @property string $filename
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UploadFiles whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UploadFiles extends Model {

  protected $table = "site_files";
  protected $fillable = [
    'page','side','title','filename','type',
  ];
  protected $hidden = [
  ];

}
