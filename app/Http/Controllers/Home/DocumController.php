<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\UploadFiles;
use App\Models\Pages;

class DocumController extends BaseController {

  public function index(Request $req) {

    $page         = $req->query('page');
    $TitlePage    = Pages::where('page', $page)->first();
    if($page == 'pae'){
      $DownloadFile = UploadFiles::where('page', $page)->orderBy('updated_at','desc')->get();
    }elseif($page == 'vidsamop' OR  $page =='top100' OR $page =='cooldp' OR $page=='reldoc'){
      $DownloadFile = UploadFiles::where('page', $page)->orderBy('updated_at','desc')->get();
    }else{
      $DownloadFile = UploadFiles::where('page', $page)->get();
    }
    
    return view('home.document', compact(['TitlePage', 'DownloadFile']));
  }

}
