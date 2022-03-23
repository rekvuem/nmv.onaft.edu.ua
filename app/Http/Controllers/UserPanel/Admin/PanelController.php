<?php

namespace App\Http\Controllers\UserPanel\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanel\BaseController;

class PanelController extends BaseController {

  public function index() {
    return view("panel.admin.controll");
  }

}
