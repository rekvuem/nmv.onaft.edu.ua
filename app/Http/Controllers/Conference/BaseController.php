<?php

namespace App\Http\Controllers\Conference;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

abstract class BaseController extends Controller {
  
  static function SessionHeadTitleConf() {
    $selDB = DB::table('confer_home')->where('id', 1)->first();
    session(['title_head_conference' => $selDB->title_conference]);
    return true;
  }  
}