<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OlimpController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function firstetap() {
    $Find = DB::table('olympic_text')->where('page', '1etap')->first();
    IF (empty($Find))
    {
      return view('panel.ucheb.olymp.1etap');
    } else
    {
      $SelectDB = DB::table('olympic_text')->where('page', '1etap')->first();
      return view('panel.ucheb.olymp.1etap', compact('SelectDB'));
    }
  }
  
  public function secondtetap() {
    $Find = DB::table('olympic_text')->where('page', '2etap')->first();
    IF (empty($Find))
    {
      return view('panel.ucheb.olymp.2etap');
    } else
    {
      $SelectDB = DB::table('olympic_text')->where('page', '2etap')->first();
      return view('panel.ucheb.olymp.2etap', compact('SelectDB'));
    }
  }
  

   public function winner1() {

    return view('panel.ucheb.olymp.winner_one');
  } 

  public function winner2() {

    return view('panel.ucheb.olymp.winner_two');
  } 
  
  
 
  public function OlympUpdate(Request $req) {

    if ($req->page == '1etap')
    {
      DB::table('olympic_text')->where('page', $req->page)->update(['text' => $req->discription]);
    }
    if ($req->page == '2etap')
    {
      DB::table('olympic_text')->where('page', $req->page)->update(['text' => $req->discription]);
    }
    return back();
  }
  
  

}
