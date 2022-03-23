<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pages
 *
 * @property int $id_page
 * @property string $page
 * @property string $page_group
 * @property string $title_page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages whereIdPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages wherePageGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pages whereTitlePage($value)
 * @mixin \Eloquent
 */
class Pages extends Model
{
  public $timestamps = false;
  protected $table = "pages";
  protected $fillable = [
    'page','page_group','title_page',
  ];
  protected $hidden = [
  ];
}
