<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

abstract class BaseController extends Controller
{
  static function SessionHeadTitleConf() {
    $selDB = DB::table('confer_home')->where('id', 2)->first();
    session(['title_head_college' => $selDB->title_conference]);
    return true;
  }  
}
