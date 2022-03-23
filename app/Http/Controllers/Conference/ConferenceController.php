<?php

namespace App\Http\Controllers\Conference;

use Illuminate\Support\Facades\DB;

class ConferenceController extends BaseController {

  public function __construct() {
    $this->SessionHeadTitleConf();
  }

  public function index() {
    $selDB = DB::table('confer_home')->where('id', 1)->first();
    return view('conference.home', compact('selDB'));
  }

  public function komitet() {
    $selDB = DB::table('confer_home')->where('id', 1)->first();
    return view('conference.komitet', compact('selDB'));
  }

  public function reglament() {
    $selDB = DB::table('confer_home')->where('id', 1)->first();
    return view('conference.reglament', compact('selDB'));
  }

  public function programm() {
    $selectBaseConference = DB::table('confer_files')
        ->where('active', '1')
        ->where('page', 'prog_academy')
        ->get();
    return view('conference.programm', compact('selectBaseConference'));
  }

  public function sxem() {
    return view('conference.sxem');
  }

  public function tezici() {
    $selectTezicConference = DB::table('confer_files')
        ->where('active', '1')
        ->where('page', 'zbirnik_academy')
        ->orderByDesc('updated_at')
        ->get();
    return view('conference.tezici', compact('selectTezicConference'));
  }

  public function archiv() {
    $selectArchivConference = DB::table('confer_files')
        ->where('active', '1')
        ->where('page', 'archiv')
        ->get();
    return view('conference.archiv', compact('selectArchivConference'));
  }

  public function cerficat() {
    $selectCertificatConference = DB::table('confer_files')
        ->where('active', '1')
        ->where('page', 'certificat')
        ->get();
    return view('conference.certification', compact('selectCertificatConference'));
  }

}
