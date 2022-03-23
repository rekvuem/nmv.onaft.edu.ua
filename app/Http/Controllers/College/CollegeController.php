<?php

namespace App\Http\Controllers\College;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollegeController extends BaseController {

  public function home(Request $request) {
    $this->SessionHeadTitleConf();
    $selDB = DB::table('confer_home')->where('id', 2)->first();
    return view('college.home', compact('selDB'));
  }

  public function komitet() {
    $selDB = DB::table('confer_home')->where('id', 2)->first();
    return view('college.komitet', compact('selDB'));
  }

  public function programm() {
    $selectBaseConference = DB::table('confer_files')
        ->where('active', '1')
        ->where('page', 'prog_koledj')
        ->get();
    $selDB                = DB::table('confer_home')->where('id', 2)->first();

    return view('college.programm', compact(['selectBaseConference', 'selDB']));
  }

  public function tezici() {
    $selectTezicConference = DB::table('confer_files')
        ->where('active', '1')
        ->where('page', 'zbirnik_koledj')
        ->orderBy('updated_at', 'desc')
        ->get();
    return view('college.tezici', compact('selectTezicConference'));
  }

  public function stends() {
    return view('college.stends');
  }

}
