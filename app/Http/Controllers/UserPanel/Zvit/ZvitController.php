<?php

namespace App\Http\Controllers\UserPanel\Zvit;

use \App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ZvitController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $result_1a= $this->result_1a($ActiveZvit);
    $result_1b= $this->result_1b($ActiveZvit);
    
    $result_3=$this->result_3($ActiveZvit);
    $result_4=$this->result_4($ActiveZvit);
    $result_5=$this->result_5($ActiveZvit);
    $result_6=$this->result_6($ActiveZvit);
    $result_7=$this->result_7($ActiveZvit);
    
    $result_8=$this->result_8($ActiveZvit); // round((148 + 154) / p6(5),3)
    $result_9=$this->result_9($ActiveZvit); // round((64*100)/ p6(5),3)
    $result_10=$this->result_10($ActiveZvit);
    $result_11=$this->result_11($ActiveZvit);
    $result_12=$this->result_12($ActiveZvit);
    $result_13=$this->result_13($ActiveZvit);

    $ShowListYear = DB::table('zvit_year')->orderBy('year')->get();
    $directory ="/download/zvit/";
    $all_files= Storage::allFiles($directory);
   
    return view('panel.zvit.index', compact([
      'ShowListYear', 'all_files', 'result_1a', 'result_1b', 'result_3', 'result_4', 'result_5', 'result_6', 'result_7', 
      'result_8','result_9','result_10','result_11','result_12','result_13',
    ]));
  }

  public function activeyear(Request $req) {
    $YearActiv = DB::table('zvit_year')->where('id', $req->id)->first();
    $req->session()->flash('info', '' . $YearActiv->year . ' рік. Активовано!');

    $ActiveUpd = DB::table('zvit_year')->update(['actives' => '0']);
    sleep(1);
    $Active    = DB::table('zvit_year')->where('id', $req->id)->update(['actives' => '1']);
    return back();
  }

  public function listfs(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);

    $ShowListFK  = DB::table('zvit_allfk')->where('zvit_year_id', $ActiveZvit)->get();
    $ShowListOKR = DB::table('zvit_allokr')->where('zvit_year_id', $ActiveZvit)->get();
    return view('panel.zvit.fslist', compact([
      'ShowListFK', 'ShowListOKR', 'ActiveZvit'
    ]));
  }

  public function storekf(Request $req) {
    $req->session()->flash('add', 'Додано!');
    $ActiveZvit = $this->ActiveYearZvit($req);
    DB::table('zvit_allfk')->insert([
      'zvit_year_id' => $ActiveZvit,
      'faculty'      => $req->faculty,
      'kafedra'      => $req->kafedra
    ]);
    return redirect()->route('spanel.zvit.list.fslist');
  }

  public function storeokr(Request $req) {
    $req->session()->flash('add', 'Додано!');
    $ActiveZvit = $this->ActiveYearZvit($req);
    DB::table('zvit_allokr')->insert([
      'zvit_year_id' => $ActiveZvit,
      'stupen'       => $req->type_special,
      'kod_special'  => $req->specialkod
    ]);
    return redirect()->route('spanel.zvit.list.fslist');
  }

  public function facultyedit($idfaculty, Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);

    $faculty_select = DB::table('zvit_allfk')->where('id', $idfaculty)->first();
    $faculty_list   = DB::table('zvit_allfk')->where('zvit_year_id', $ActiveZvit)->get();

    return view('panel.zvit.edit.faculty', compact([
      'faculty_select', 'faculty_list'
    ]));
  }

  public function update_faculty(Request $req, $idfaculty) {
    $req->session()->flash('update', 'Оновлено!');
    $update_faculty = DB::table('zvit_allfk')
        ->where('id', $idfaculty)
        ->update(['faculty' => $req->facultyname, 'kafedra' => $req->kafedraname]);
    return redirect()->route('spanel.zvit.list.fslist');
  }

  public function destroyfaculty($facultyid) {

    $delete_faculty = DB::table('zvit_allfk')->where('id', $facultyid)->delete();

    return redirect()->route('spanel.zvit.list.fslist');
  }

  public function okr_edit($okr, Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $okr_select = DB::table('zvit_allokr')->where('id', $okr)->first();
    return view('panel.zvit.edit.okr', compact([
      'okr_select'
    ]));
  }

  public function okr_update(Request $req, $idfaculty) {
    $req->session()->flash('update', 'Оновлено!');
    $update_faculty = DB::table('zvit_allokr')
        ->where('id', $idfaculty)
        ->update(['stupen' => $req->stupen_select, 'kod_special' => $req->kodspecial]);
    return redirect()->route('spanel.zvit.list.fslist');
  }

  public function okr_destroy($okr) {
    $delete_okr = DB::table('zvit_allokr')->where('id', $okr)->delete();
    return redirect()->route('spanel.zvit.list.fslist');
  }

  
  
  public function copyBaseOKR(Request $request){   
//    DB::insert('INSERT INTO zvit_allfk (zvit_year_id, faculty, kafedra) SELECT 7, faculty, kafedra FROM zvit_allfk WHERE zvit_year_id=5');
//    DB::insert('INSERT INTO zvit_allokr (zvit_year_id, stupen, kod_special) SELECT 7, stupen, kod_special FROM zvit_allokr WHERE zvit_year_id=5');
//    DB::insert('INSERT INTO zvit_tablica1	(zvit_year_id, zvit_allokr_id, kilkist, proxodj, zdobul_winner, zdobul_winner1, zdobul_winner2, zdobul_winner3, inozemec, grom) 	SELECT 7, id, 0, 0,0,0,0,0,0,0 FROM zvit_allokr WHERE zvit_year_id=5');
//    DB::insert('INSERT INTO zvit_tablica2	(zvit_year_id, zvit_allfk_id, how_much, staj, nayk_shef, stupeni, doctor)	SELECT 7, id, 0, 0, 0, 0,0 FROM zvit_allfk WHERE zvit_year_id=5');
    
    
    return abort('404', 'Помилка копіювання не можливе, звернітся до адміністратора сайту');
//    return back();
  }
  
  
  
}
