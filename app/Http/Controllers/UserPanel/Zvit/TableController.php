<?php

namespace App\Http\Controllers\UserPanel\Zvit;

use \App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TableController extends BaseController {
  /*   * ************************  TABLE1 ************************** */

//  protected $rownum;

  public function table1(Request $req) {

    $ActiveZvit = $this->ActiveYearZvit($req);
    $ListOkr    = DB::table('zvit_allokr')->where('zvit_year_id', $ActiveZvit)->get();
    $Sum        = DB::table('zvit_tablica1')->where('zvit_year_id', $ActiveZvit)->sum(DB::raw('zdobul_winner+zdobul_winner1+zdobul_winner2+zdobul_winner3'));
    //DB::raw функция соединяет пару столбцов
    $Table1     = DB::table('zvit_tablica1')
        ->leftJoin('zvit_allokr', 'zvit_tablica1.zvit_allokr_id', '=', 'zvit_allokr.id')
        ->where('zvit_tablica1.zvit_year_id', '=', $ActiveZvit)
        ->get();

    return view('panel.zvit.table1', compact([
      'Table1', 'ListOkr', 'Sum',
    ]));
  }

  public function edit_tablica1($tablica1, Request $req) {
    $ActiveZvit  = $this->ActiveYearZvit($req);
    $ListOkr     = DB::table('zvit_allokr')->where('zvit_year_id', $ActiveZvit)->get();
    $Table1_edit = DB::table('zvit_tablica1')
        ->leftJoin('zvit_allokr', 'zvit_tablica1.zvit_allokr_id', '=', 'zvit_allokr.id')
        ->where('zvit_tablica1.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_tablica1.id_tablica1', $tablica1)
        ->first();
    return view('panel.zvit.edit.tablica1', compact(['Table1_edit', 'ListOkr']));
  }

  public function update_tablica1($tablica1, Request $req) {
    $req->session()->flash('update', 'Оновлено!');
    $update_table = DB::table('zvit_tablica1')
        ->where('id_tablica1', $tablica1)
        ->update([
      'zvit_allokr_id' => $req->allokr,
      'kilkist'        => $req->kilkist,
      'proxodj'        => $req->staj,
      'zdobul_winner'  => $req->winner,
      'zdobul_winner1' => $req->winner1,
      'zdobul_winner2' => $req->winner2,
      'zdobul_winner3' => $req->winner3,
      'inozemec'       => $req->inozemec,
      'grom'           => $req->gromodyan,
    ]);

    return back();
  }

  public function insert_tablica1(Request $req) {
    $ActiveZvit    = $this->ActiveYearZvit($req);
    $req->session()->flash('add', 'Додано запис!');
    $insert_table1 = DB::table('zvit_tablica1')
        ->insert([
      'zvit_year_id'   => $ActiveZvit,
      'zvit_allokr_id' => $req->allokr,
      'kilkist'        => $req->kilkist,
      'proxodj'        => $req->staj,
      'zdobul_winner'  => $req->winner,
      'zdobul_winner1' => $req->winner1,
      'zdobul_winner2' => $req->winner2,
      'zdobul_winner3' => $req->winner3,
      'inozemec'       => $req->inozemec,
      'grom'           => $req->gromodyan,
    ]);

    return back();
  }

  public function delete_tablica1($tablica1, Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $req->session()->flash('delete', 'Видалено запис!');

    $delete_table1 = DB::table('zvit_tablica1')->where('id_tablica1', $tablica1)->delete();

    return back();
  }

  /*   * *********************** TABLE2 ********************************* */

  public function table2(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);

    $ListFk = DB::table('zvit_allfk')->get();
    $Table2 = DB::table('zvit_tablica2')
        ->leftJoin('zvit_allfk', 'zvit_tablica2.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica2.zvit_year_id', '=', $ActiveZvit)
        ->get();
    return view('panel.zvit.table2', compact([
      'Table2', 'ListFk',
    ]));
  }

  public function edit_tablica2($tablica2, Request $req) {
    $ActiveZvit  = $this->ActiveYearZvit($req);
    $ListFk      = DB::table('zvit_allfk')->where('zvit_year_id', $ActiveZvit)->get();
    $Table2_edit = DB::table('zvit_tablica2')
        ->leftJoin('zvit_allfk', 'zvit_tablica2.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica2.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_tablica2.id_tablica2', $tablica2)
        ->first();

    return view('panel.zvit.edit.tablica2', compact(['Table2_edit', 'ListFk']));
  }

  public function update_tablica2($tablica2, Request $req) {

    $req->session()->flash('update', 'Оновлено!');
    $update_table = DB::table('zvit_tablica2')
        ->where('id_tablica2', $tablica2)
        ->update([
      'zvit_allfk_id' => $req->zvit_allfk,
      'how_much'      => $req->how_much,
      'staj'          => $req->stajuvannya,
      'nayk_shef'     => $req->nayk_shef,
      'stupeni'       => $req->stupen,
      'doctor'        => $req->doctor
    ]);

    return back();
  }

  public function insert_tablica2(Request $req) {
    $ActiveZvit    = $this->ActiveYearZvit($req);
    $req->session()->flash('add', 'Додано запис!');
    $insert_table1 = DB::table('zvit_tablica2')
        ->insert([
      'zvit_year_id'  => $ActiveZvit,
      'zvit_allfk_id' => $req->zvit_allfk,
      'how_much'      => $req->how_much,
      'staj'          => $req->stajuvannya,
      'nayk_shef'     => $req->nayk_shef,
      'stupeni'       => $req->stupen,
      'doctor'        => $req->doctor
    ]);

    return back();
  }

  public function delete_tablica2($tablica2, Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $req->session()->flash('delete', 'Видалено запис!');

    $delete_table1 = DB::table('zvit_tablica2')->where('id_tablica2', $tablica2)->delete();

    return back();
  }

  /*   * *********************** TABLE3 ********************************* */

  public function table3(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $ListFk     = DB::table('zvit_allfk')->where('zvit_year_id',$ActiveZvit)->get();
    $Table3     = DB::table('zvit_tablica3')
        ->leftJoin('zvit_allfk', 'zvit_tablica3.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica3.zvit_year_id', '=', $ActiveZvit)
        ->orderBy('pib')
        ->get();
    return view('panel.zvit.table3', compact([
      'Table3', 'ListFk',
    ]));
  }

  public function edit_tablica3($tablica3, Request $req) {
    $ActiveZvit  = $this->ActiveYearZvit($req);
    $ListFk      = DB::table('zvit_allfk')->where('zvit_year_id', $ActiveZvit)->get();
    $Table3_edit = DB::table('zvit_tablica3')
        ->leftJoin('zvit_allfk', 'zvit_tablica3.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica3.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_tablica3.id_tablica3', $tablica3)
        ->first();

    return view('panel.zvit.edit.tablica3', compact(['Table3_edit', 'ListFk']));
  }

  public function update_tablica3($tablica3, Request $req) {
    $req->session()->flash('update', 'Оновлено!');
    $update_table = DB::table('zvit_tablica3')
        ->where('id_tablica3', $tablica3)
        ->update([
      'zvit_allfk_id'     => $req->zvit_allfk,
      'pib'               => $req->pib,
      'scoup_number'      => $req->scoup_number,
      'index_griw_scopus' => $req->index_griw_scopus,
      'web_number'        => $req->web_number,
      'idex_gri_web_scop' => $req->idex_gri_web_scop
    ]);

    return back();
  }

  public function insert_tablica3(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);

    $messages = [
      'pib.required' => 'Поле ПІБ наукового, науково-педагогічного працівника обов’язкове.',
    ];

    $rules = [
      'pib' => ['required'],
    ];

    $validator = Validator::make($req->all(), $rules, $messages)->validate();


      $req->session()->flash('add', 'Додано запис!');
      $insert_table3 = DB::table('zvit_tablica3')
          ->insert([
        'zvit_year_id'      => $ActiveZvit,
        'zvit_allfk_id'     => $req->zvit_allfk,
        'pib'               => $req->pib,
        'scoup_number'      => $req->scoup_number,
        'index_griw_scopus' => $req->index_griw_scopus,
        'web_number'        => $req->web_number,
        'idex_gri_web_scop' => $req->idex_gri_web_scop
      ]);
   return back();

  }

  public function delete_tablica3($tablica3, Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $req->session()->flash('delete', 'Видалено запис!');

    $delete_table1 = DB::table('zvit_tablica3')->where('id_tablica3', $tablica3)->delete();

    return back();
  }

  /*   * ************************ TABLE4 ******************************* */

  public function table4(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $ListFk     = DB::table('zvit_allfk')->where('zvit_year_id',$ActiveZvit)->get();
    $Table4     = DB::table('zvit_tablica4')
        ->leftJoin('zvit_allfk', 'zvit_tablica4.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica4.zvit_year_id', '=', $ActiveZvit)
        ->orderBy('zvit_tablica4.pib','ASC')
        ->get();
    return view('panel.zvit.table4', compact([
      'Table4', 'ListFk'
    ]));
  }

  public function edit_tablica4($tablica4, Request $req) {
    $ActiveZvit  = $this->ActiveYearZvit($req);
    $ListFk      = DB::table('zvit_allfk')->where('zvit_year_id', $ActiveZvit)->get();
    $Table4_edit = DB::table('zvit_tablica4')
        ->leftJoin('zvit_allfk', 'zvit_tablica4.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica4.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_tablica4.id_tablica4', $tablica4)
        ->first();

    return view('panel.zvit.edit.tablica4', compact(['Table4_edit', 'ListFk']));
  }

  public function update_tablica4($tablica4, Request $req) {
    $req->session()->flash('update', 'Оновлено!');
    $update_table = DB::table('zvit_tablica4')
        ->where('id_tablica4', $tablica4)
        ->update([
      'zvit_allfk_id'  => $req->zvit_allfk,
      'pib'            => $req->pib,
      'stat_news'      => $req->sum_pub_scopus,
      'sum_publish'    => $req->sum_webofscience,
      'title_rekviz'   => $req->nazva_scopus,
      'title_nazv_rek' => $req->title_webofscience
    ]);

    return redirect()->route('spanel.zvit.table4');
  }

  public function insert_tablica4(Request $req) {
    $ActiveZvit    = $this->ActiveYearZvit($req);
    
    $messages = [
      'pib.required' => 'Поле ПІБ наукового, науково-педагогічного працівника обов’язкове.',
      'sum_pub_scopus.regex'    => 'Вибачте, Кількість публікацій Scopus але такий вид даних не підтримується, треба ввести цифру',
      'sum_webofscience.regex'    => 'Вибачте, Кількість публікацій Web of Science але такий вид даних не підтримується, треба ввести цифру',
    ];

    $rules = [
      'pib' => ['required'],
      'sum_pub_scopus' => ['required','string', 'regex:/[(1234567890)]/u'],
      'sum_webofscience' => ['required','string', 'regex:/[(1234567890)]/u'],
    ];

    $validator = Validator::make($req->all(), $rules, $messages)->validate();
    
    $req->session()->flash('add', 'Додано запис!');
    $insert_table3 = DB::table('zvit_tablica4')
        ->insert([
      'zvit_year_id'   => $ActiveZvit,
      'zvit_allfk_id'  => $req->zvit_allfk,
      'pib'            => $req->pib,
      'stat_news'      => $req->sum_pub_scopus,
      'sum_publish'    => $req->sum_webofscience,
      'title_rekviz'   => $req->nazva_scopus,
      'title_nazv_rek' => $req->title_webofscience
    ]);

    return back();
  }

  public function delete_tablica4($tablica4, Request $req) {
    $delete_table1 = DB::table('zvit_tablica4')->where('id_tablica4', $tablica4)->delete();

    return back();
  }

  /*   * *************************     TABLE5    ******************************** */

  public function table5(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);

    $Table_5_17 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->whereNotNull('row17')
        ->count();
    $Table_5_18 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->whereNotNull('row18')
        ->count();
    $Table_5_19 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->whereNotNull('row19')
        ->count();
    $Table_5_20 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->whereNotNull('row20')
        ->count();

    $Table5 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->get();
    return view('panel.zvit.table5', compact([
      'Table5', 'Table_5_17', 'Table_5_18', 'Table_5_19', 'Table_5_20'
    ]));
  }

  public function edit_tablica5($tablica5, $selectrow, Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $ListFk     = DB::table('zvit_allfk')->where('zvit_year_id', $ActiveZvit)->get();

    IF ($selectrow == 'row19')
    {
      $SelectRow_19 = DB::table('zvit_tablica5')
          ->where('zvit_year_id', $ActiveZvit)
          ->where('id_tablica5', $tablica5)
          ->whereNotNull('row19')
          ->first();
      return view('panel.zvit.edit.tablica5_19', compact(['SelectRow_19']));
    } elseif ($selectrow == 'row17')
    {
      $SelectRow_17 = DB::table('zvit_tablica5')
          ->where('zvit_year_id', $ActiveZvit)
          ->where('id_tablica5', $tablica5)
          ->whereNotNull('row17')
          ->first();
      return view('panel.zvit.edit.tablica5_17', compact(['SelectRow_17']));
    } elseif ($selectrow == 'row18')
    {
      $SelectRow_18 = DB::table('zvit_tablica5')
          ->where('zvit_year_id', $ActiveZvit)
          ->where('id_tablica5', $tablica5)
          ->whereNotNull('row18')
          ->first();
      return view('panel.zvit.edit.tablica5_18', compact(['SelectRow_18']));
    } elseif ($selectrow == 'row20')
    {
      $SelectRow_20 = DB::table('zvit_tablica5')
          ->where('zvit_year_id', $ActiveZvit)
          ->where('id_tablica5', $tablica5)
          ->whereNotNull('row20')
          ->first();
      return view('panel.zvit.edit.tablica5_20', compact(['SelectRow_20']));
    }
  }

  public function insert_tablica5(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $req->session()->flash('add', 'Додано запис!');
    $rownum     = $req->row;

    IF ($rownum == 17)
    {
      $insertRow17 = DB::table('zvit_tablica5')->insert(['row17' => $req->tab17, 'zvit_year_id' => $ActiveZvit]);
    } elseif ($rownum == 18)
    {
      $insertRow18 = DB::table('zvit_tablica5')->insert(['row18' => $req->tab18, 'zvit_year_id' => $ActiveZvit]);
    } elseif ($rownum == 19)
    {
      $insertRow19 = DB::table('zvit_tablica5')->insert(['row19' => $req->tab19, 'zvit_year_id' => $ActiveZvit]);
    } elseif ($rownum == 20)
    {
      $insertRow20 = DB::table('zvit_tablica5')->insert(['row20' => $req->tab20, 'zvit_year_id' => $ActiveZvit]);
    }
    return redirect()->route('spanel.zvit.table5');
  }

  public function update_tablica5($tablica5, Request $req) {
    $req->session()->flash('info', 'Оновлено!');
    $rownum = $req->row;

    IF ($rownum == 17)
    {
      $update_table = DB::table('zvit_tablica5')->where('id_tablica5', $tablica5)->update(['row17' => $req->tab17]);
    } elseif ($rownum == 18)
    {
      $update_table = DB::table('zvit_tablica5')->where('id_tablica5', $tablica5)->update(['row18' => $req->tab18]);
    } elseif ($rownum == 19)
    {
      $update_table = DB::table('zvit_tablica5')->where('id_tablica5', $tablica5)->update(['row19' => $req->tab19]);
    } elseif ($rownum == 20)
    {
      $update_table = DB::table('zvit_tablica5')->where('id_tablica5', $tablica5)->update(['row20' => $req->tab20]);
    }

    return redirect()->route('spanel.zvit.table5');
  }

  public function delete_tablica5($tablica5, Request $req) {
    $delete_table = DB::table('zvit_tablica5')->where('id_tablica5', $tablica5)->delete();

    return back();
  }

}
