<?php

namespace App\Http\Controllers\UserPanel\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Support\Facades\DB;

class PanelController extends BaseController {

  public function index() {

      $tables = DB::select('SHOW TABLES');

    return view("panel.admin.controll", compact('tables'));
  }

}
