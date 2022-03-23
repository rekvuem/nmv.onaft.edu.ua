<?php

namespace App\Http\Controllers\Home\Plane;

use App\Http\Controllers\Home\BaseController;
use App\Models\UploadFiles;
use Illuminate\Http\Request;
use App\Models\Pages;

class PlaneController extends BaseController {

  public function index(Request $req) {
    $page       = $req->query('page');
    $FileLoad   = UploadFiles::where('page', $page)->orderBy('updated_at','desc')->get();
    $SelectPage = Pages::where('page', $page)->first();

    return view('home.plane', compact(['FileLoad', 'SelectPage']));
  }
  
}
