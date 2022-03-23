<?php

namespace App\Http\Controllers\UserPanel\Zvit;

use \App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ExportController extends BaseController {

  public function Tablica1(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $phpWord    = new \PhpOffice\PhpWord\PhpWord();

    $section = $phpWord->addSection();
    $header  = array('size' => 12, 'bold' => true);

    $section->addText('Таблиця 1. Здобувачі вищої освіти', $header);
    $fancyTableStyleName     = 'Таблиця 1. ';
    $fancyTableStyle         = array('borderSize' => 6, 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
    $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF');
    $fancyTableCellStyle     = array('valign' => 'center');
    $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
    $fancyTableFontStyle     = array('bold' => true);

    $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');

    $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
    $table = $section->addTable($fancyTableStyleName);
    $table->addRow(900);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Ступінь (ОКР)', $fancyTableFontStyle);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Код та спеціальність', $fancyTableFontStyle);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Кількість', $fancyTableFontStyle);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Проходили стажування в іноземних ЗВО', $fancyTableFontStyle);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Здобули призові місця', $fancyTableFontStyle);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Іноземних громадян', $fancyTableFontStyle);
    $table->addCell(2000, $fancyTableCellStyle)->addText('Громадян з країн членів ОЕСР', $fancyTableFontStyle);

    $table1 = DB::table('zvit_tablica1')
        ->leftJoin('zvit_allokr', 'zvit_tablica1.zvit_allokr_id', '=', 'zvit_allokr.id')
        ->where('zvit_tablica1.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_allokr.zvit_year_id', '=', $ActiveZvit)
        ->get();

    foreach ($table1 as $tablica1)
    {
      $summa = $tablica1->zdobul_winner + $tablica1->zdobul_winner1 + $tablica1->zdobul_winner2 + $tablica1->zdobul_winner3;
      $table->addRow();
      $table->addCell(2000)->addText($tablica1->stupen);
      $table->addCell(2000)->addText($tablica1->kod_special);
      $table->addCell(2000)->addText($tablica1->kilkist);
      $table->addCell(2000)->addText($tablica1->proxodj);
      $table->addCell(2000)->addText($summa);
      $table->addCell(2000)->addText($tablica1->inozemec);
      $table->addCell(2000)->addText($tablica1->grom);
    }
    $table->addRow();

    $table->addCell(2000, $cellColSpan, array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true))->addText('Разом:');
    $table->addCell(2000)->addText($this->p1($ActiveZvit));
    $table->addCell(2000)->addText($this->p2($ActiveZvit));
    $table->addCell(2000)->addText($this->sum3($ActiveZvit));
    $table->addCell(2000)->addText($this->p4($ActiveZvit));
    $table->addCell(2000)->addText($this->p5($ActiveZvit));

    Storage::makeDirectory('download/zvit');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('download/zvit/ex_tab1_' . date('dm_G') . '.docx');
    $req->session()->flash('info', 'Экспорт таблиця 1!');
    return back();
  }

  public function Tablica2(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $phpWord    = new \PhpOffice\PhpWord\PhpWord();

    $section = $phpWord->addSection();
    $header  = array('size' => 12, 'bold' => true);

    $section->addText('Табліця 2. Наукові, науково-педагогічні працівники', $header);
    $fancyTableStyleName     = 'Таблиця 2. ';
    $fancyTableStyle         = array('borderSize' => 6, 'cellMargin' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
    $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF');
    $fancyTableCellStyle     = array('valign' => 'center');
    $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
    $fancyTableFontStyle     = array('bold' => true, 'valign' => 'center');

    $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');

    $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
    $table2 = $section->addTable($fancyTableStyleName);
    $table2->addRow(900);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Факультет (Інститут)', $fancyTableFontStyle);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Кафедра відділ тощо', $fancyTableFontStyle);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Кількість', $fancyTableFontStyle);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Проходили стажування в іноземних ЗВО', $fancyTableFontStyle);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні', $fancyTableFontStyle);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Науково-педагогічні працівники, науковий ступінь та/або вчене звання', $fancyTableFontStyle);
    $table2->addCell(2000, $fancyTableCellStyle)->addText('Науково-педагогічні працівники, доктори наук та/або професори', $fancyTableFontStyle);

    $select2 = DB::table('zvit_tablica2')
        ->leftJoin('zvit_allfk', 'zvit_tablica2.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica2.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_allfk.zvit_year_id', '=', $ActiveZvit)
        ->get();

    foreach ($select2 as $tablica2)
    {
      $table2->addRow();
      $table2->addCell(2000)->addText($tablica2->faculty);
      $table2->addCell(2000)->addText($tablica2->kafedra);
      $table2->addCell(2000)->addText($tablica2->how_much);
      $table2->addCell(2000)->addText($tablica2->staj);
      $table2->addCell(2000)->addText($tablica2->nayk_shef);
      $table2->addCell(2000)->addText($tablica2->stupeni);
      $table2->addCell(2000)->addText($tablica2->doctor);
    }
    $table2->addRow();
    $table2->addCell(2000, $cellColSpan, array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true))->addText('Разом:');
    $table2->addCell(2000)->addText($this->p6($ActiveZvit));
    $table2->addCell(2000)->addText($this->p7($ActiveZvit));
    $table2->addCell(2000)->addText($this->p7($ActiveZvit));
    $table2->addCell(2000)->addText($this->p9($ActiveZvit));
    $table2->addCell(2000)->addText($this->p10($ActiveZvit));

    Storage::makeDirectory('download/zvit');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('download/zvit/ex_tab2_' . date('dm_G') . '.docx');
    $req->session()->flash('info', 'Экспорт таблиця 2!');
    return back();
  }

  public function Tablica3(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $phpWord    = new \PhpOffice\PhpWord\PhpWord();

    $section = $phpWord->addSection();
    $header  = array('size' => 12, 'bold' => true);

    $section->addText('Табліця 3. Наукометричні показники', $header);
    $fancyTableStyleName     = 'Таблиця 3. ';
    $fancyTableStyle         = array('borderSize' => 6, 'cellMargin' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
    $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF');
    $fancyTableCellStyle     = array('valign' => 'center');
    $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
    $fancyTableFontStyle     = array('bold' => true, 'valign' => 'center');

    $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');

    $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
    $table3 = $section->addTable($fancyTableStyleName);
    $table3->addRow(900);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('Факультет (Інститут)', $fancyTableFontStyle);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('Кафедра, відділ тощо', $fancyTableFontStyle);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('Призвище, ім`я, по батькові наукового, науково-педагогічного працівника ', $fancyTableFontStyle);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('ID Scopus (за наявності)', $fancyTableFontStyle);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('Індекс Гірша Scopus', $fancyTableFontStyle);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('ID Web of Science', $fancyTableFontStyle);
    $table3->addCell(2000, $fancyTableCellStyle)->addText('Індекс Гірша Web of Science', $fancyTableFontStyle);

    $select3 = DB::table('zvit_tablica3')
        ->leftJoin('zvit_allfk', 'zvit_tablica3.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica3.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_allfk.zvit_year_id', '=', $ActiveZvit)
        ->get();

    foreach ($select3 as $tablica3)
    {
      $table3->addRow();
      $table3->addCell(2000)->addText($tablica3->faculty);
      $table3->addCell(2000)->addText($tablica3->kafedra);
      $table3->addCell(2000)->addText($tablica3->pib);
      $table3->addCell(2000)->addText($tablica3->scoup_number);
      $table3->addCell(2000)->addText($tablica3->index_griw_scopus);
      $table3->addCell(2000)->addText($tablica3->web_number);
      $table3->addCell(2000)->addText($tablica3->idex_gri_web_scop);
    }
    $table3->addRow();
    $table3->addCell(2000, $cellColSpan, array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true))->addText('Разом:');
    $table3->addCell(2000)->addText($this->p11($ActiveZvit));
    $table3->addCell(2000)->addText('-');
    $table3->addCell(2000)->addText($this->p12($ActiveZvit));
    $table3->addCell(2000)->addText('-');
    $table3->addCell(2000)->addText($this->p13($ActiveZvit));

    Storage::makeDirectory('download/zvit');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('download/zvit/ex_tab3_' . date('dm_G') . '.docx');
    $req->session()->flash('info', 'Экспорт таблиця 3!');
    return back();
  }

  public function Tablica4(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $phpWord    = new \PhpOffice\PhpWord\PhpWord();

    $sectionStyle = array(
      'orientation' => 'landscape',
    );
    $section      = $phpWord->addSection($sectionStyle);
    $header       = array('size' => 12, 'bold' => true);

    $section->addText('Табліця 4. Наукові, науково-педагогічні працівники, які мають не менше п`яти наукових публікацій у періодичних видання, які на час публікації було включено до наукометричних баз Scopus або Web of Science', $header);
    $fancyTableStyleName     = 'Таблиця 4. ';
    $fancyTableStyle         = array('borderSize' => 6, 'cellMargin' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
    $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF');
    $fancyTableCellStyle     = array('valign' => 'center');
    $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
    $fancyTableFontStyle     = array('bold' => true, 'valign' => 'center');

    $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');

    $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
    $table4 = $section->addTable($fancyTableStyleName);
    $table4->addRow(900);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Факультет (Інститут)', $fancyTableFontStyle);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Кафедра відділ тощо', $fancyTableFontStyle);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Прізвище, ім`я, по батькові наукового, науково-педагогічного працівника', $fancyTableFontStyle);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Кількість публікацій Scopus', $fancyTableFontStyle);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Назва та реквізити публикацій Scopus (прирівняні відзнаки)', $fancyTableFontStyle);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Кількість публікацій Web of Science ', $fancyTableFontStyle);
    $table4->addCell(2000, $fancyTableCellStyle)->addText('Назва та реквізити публікацій Web of Science (прирівняні відзнаки)', $fancyTableFontStyle);

    $select4 = DB::table('zvit_tablica4')
        ->leftJoin('zvit_allfk', 'zvit_tablica4.zvit_allfk_id', '=', 'zvit_allfk.id')
        ->where('zvit_tablica4.zvit_year_id', '=', $ActiveZvit)
        ->where('zvit_allfk.zvit_year_id', '=', $ActiveZvit)
        ->orderBy('zvit_tablica4.pib')
        ->get();

    foreach ($select4 as $tablica4)
    {
   
      
      $cheking_rekviz   = strip_tags($tablica4->title_rekviz, '<br>');
      $cheking_nazv_rek = strip_tags($tablica4->title_nazv_rek, '<br>');

      $textlines_rekviz   = explode("<br>", $cheking_rekviz);
      $textlines_nazv_rek = explode("<br>", $cheking_nazv_rek);

      $table4->addRow();
      $table4->addCell(2000)->addText($tablica4->faculty);
      $table4->addCell(2000)->addText($tablica4->kafedra);
      $table4->addCell(2000)->addText($tablica4->pib);
      $table4->addCell(2000)->addText($tablica4->stat_news);
      $cell_5    = $table4->addCell(2000);
      $textrun_5 = $cell_5->addTextRun();
      foreach ($textlines_rekviz as $line_5)
      {
        $textrun_5->addTextBreak();
        $textrun_5->addText(htmlspecialchars($line_5));
      }

      $table4->addCell(2000)->addText($tablica4->sum_publish);
      $cell_7    = $table4->addCell(2000);
      $textrun_7 = $cell_7->addTextRun();
      foreach ($textlines_nazv_rek as $line_7)
      {
        $textrun_7->addTextBreak();
        $textrun_7->addText(htmlspecialchars($line_7));
      }
    }
    $table4->addRow();
    $table4->addCell(2000, $cellColSpan, array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true))->addText('Разом:');
    $table4->addCell(2000)->addText($this->p14($ActiveZvit));
    $table4->addCell(2000)->addText($this->p15($ActiveZvit));
    $table4->addCell(2000)->addText('-');
    $table4->addCell(2000)->addText($this->p16($ActiveZvit));
    $table4->addCell(2000)->addText('-');

    Storage::makeDirectory('download/zvit');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('download/zvit/ex_tab4_' . date('dm_G') . '.docx');
    $req->session()->flash('info', 'Экспорт таблиця 4!');
    return back();
  }

  public function Tablica5(Request $req) {
    $ActiveZvit = $this->ActiveYearZvit($req);
    $phpWord    = new \PhpOffice\PhpWord\PhpWord();

    $section = $phpWord->addSection();
    $header  = array('size' => 12, 'bold' => true);

    $section->addText('Табліця 5. Наукові журнали та об`єкти інтелектуальної власності', $header);
    $fancyTableStyleName     = 'Таблиця 5. ';
    $fancyTableStyle         = array('borderSize' => 6, 'cellMargin' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
    $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF');
    $fancyTableCellStyle     = array('valign' => 'center');
    $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
    $fancyTableFontStyle     = array('bold' => true, 'valign' => 'center');

    $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');

    $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
    $table5 = $section->addTable($fancyTableStyleName);
    $table5->addRow(900);
    $table5->addCell(2000, $fancyTableCellStyle)->addText('', $fancyTableFontStyle);
    $table5->addCell(400, $fancyTableCellStyle)->addText('', $fancyTableFontStyle);
    $table5->addCell(7000, $fancyTableCellStyle)->addText('Назви, реквізити (коди)', $fancyTableFontStyle);

    $table5->addRow(900);
    $table5->addCell(3000, $fancyTableCellStyle)->addText('Кількість наукових журналів, які входять з ненульовим коефіцієнтом впливовості до наукометричних баз', $fancyTableFontStyle);
    $table5->addCell(400, $fancyTableCellStyle)->addText($this->p17($ActiveZvit));
    $cell             = $table5->addCell(7000, $fancyTableCellStyle);
    
    $sql_select_row17 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->get();
    
    foreach ($sql_select_row17 as $ansver_row17)
    {
      IF ($ansver_row17->row17 == NULL)
      {
        
      } else
      {
        $cell->addText($ansver_row17->row17, array('lineHeight' => 1), array('space' => array('before' => 0, 'after' => 0)));
      }
    }
    $table5->addRow(900);
    $table5->addCell(3000, $fancyTableCellStyle)->addText('Кількість спеціальностей', $fancyTableFontStyle);
    $table5->addCell(400, $fancyTableCellStyle)->addText($this->p18($ActiveZvit));
    $cell             = $table5->addCell(7000, $fancyTableCellStyle);
    $sql_select_row18 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->get();
    
    foreach ($sql_select_row18 as $ansver_row18)
    {
      IF ($ansver_row18->row18 == NULL)
      {
        
      } else
      {
        $cell->addText($ansver_row18->row18, array('lineHeight' => 1), array('space' => array('before' => 0, 'after' => 0)));
      }
    }
    $table5->addRow(900);
    $table5->addCell(3000, $fancyTableCellStyle)->addText('Кількість об`єктів права інтелектуальної власності, що зареєстровані закладом вищої освіти та/або зареєстровані (створені) його науково-педагогічними та науковими працівниками', $fancyTableFontStyle);
    $table5->addCell(400, $fancyTableCellStyle)->addText($this->p19($ActiveZvit));
    $cell             = $table5->addCell(7000, $fancyTableCellStyle);
    
  
    $sql_select_row19 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->get();
    
    
    
    foreach ($sql_select_row19 as $ansver_row19)
    {
      IF ($ansver_row19->row19 == NULL)
      {
        
      } else
      {
        $cell->addText($ansver_row19->row19, array('lineHeight' => 1), array('space' => array('before' => 0, 'after' => 0)));
      }
    }


    $table5->addRow(900);
    $table5->addCell(3000, $fancyTableCellStyle)->addText('Кількість об`єктів права інтелектуальної власності, які комерціалізовано закладом вищої освіти та/або його науково-педагогічними та науковими працівниками', $fancyTableFontStyle);
    $table5->addCell(400, $fancyTableCellStyle)->addText($this->p20($ActiveZvit));
    $cell = $table5->addCell(7000, $fancyTableCellStyle);

        $sql_select_row20 = DB::table('zvit_tablica5')
        ->where('zvit_tablica5.zvit_year_id', '=', $ActiveZvit)
        ->get();

    foreach ($sql_select_row20 as $ansver_row20)
    {
      IF ($ansver_row20->row20 == NULL)
      {
        
      } else
      {
        $cell->addText($ansver_row20->row20, array('lineHeight' => 1), array('space' => array('before' => 0, 'after' => 0)));
      }
    }

    $section->addPageBreak();
    $section->addText('Табліця 6. Порівняльні показники', $header);
    $table6 = $section->addTable($fancyTableStyleName);
    $table6->addRow();
    $table6->addCell(500)->addText('1а');
    $table6->addCell(6000)->addText('Кількість здобувачів вищої освіти денної форми навчання на одного науково-педагогічного працівника, який працює у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду і має науковий ступінь доктора наук та/або вчене звання професора');
    $table6->addCell(2000)->addText($this->result_1a($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('1б');
    $table6->addCell(2000)->addText('Кількість здобувачів вищої освіти денної форми навчання на одного науково-педагогічного працівника, який працює у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду і має науковий ступінь та/або вчене звання');
    $table6->addCell(2000)->addText($this->result_1b($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('2');
    $table6->addCell(2000)->addText('Питома вага здобувачів вищої освіти, які під час складання єдиного державного кваліфікаційного іспиту продемонстрували результати в межах 25 відсотків кращих серед учасників відповідного іспиту протягом звітного періоду, але не більше трьох останніх років (стосується здобувачів вищої освіти, для яких передбачається складення єдиного державного кваліфікаційного іспиту)');
    $table6->addCell(2000)->addText('-');
    $table6->addRow();
    $table6->addCell(2000)->addText('3');
    $table6->addCell(2000)->addText('Кількість здобувачів вищої освіти денної форми навчання, які не менше трьох місяців протягом звітного періоду або із завершенням у звітному періоді навчалися (стажувалися) в іноземних закладах вищої освіти (наукових установах) за межами України, приведена до 100 здобувачів вищої освіти денної форми навчання');
    $table6->addCell(2000)->addText($this->result_3($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('4');
    $table6->addCell(2000)->addText('Кількість науково-педагогічних і наукових працівників, які не менше трьох місяців протягом звітного періоду або із завершенням у звітному періоді стажувалися, проводили навчальні заняття в іноземних закладах вищої освіти (наукових установах) (для закладів вищої освіти та наукових установ культурологічного та мистецького спрямування - проводили навчальні заняття або брали участь (у тому числі як члени журі) у культурно-мистецьких проектах) за межами України, приведена до 100 науково-педагогічних і наукових працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду');
    $table6->addCell(2000)->addText($this->result_4($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('5');
    $table6->addCell(2000)->addText('Кількість здобувачів вищої освіти, які здобули у звітному періоді призові місця на Міжнародних студентських олімпіадах, II етапі Всеукраїнської студентської олімпіади, II етапі Всеукраїнського конкурсу студентських наукових робіт, інших освітньо-наукових конкурсах, які проводяться або визнані МОН, міжнародних та всеукраїнських культурно-мистецьких проектах, які проводяться або визнані Мінкультури, на Олімпійських, Паралімпійських, Дефлімпійських іграх, Всесвітній та Всеукраїнській універсіадах, чемпіонатах світу, Європи, Європейських іграх, етапах Кубків світу та Європи, чемпіонату України з видів спорту, які проводяться або визнані центральним органом виконавчої влади, що забезпечує формування державної політики у сфері фізичної культури та спорту, приведена до 100 здобувачів вищої освіти денної форми навчання');
    $table6->addCell(2000)->addText($this->result_5($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('6');
    $table6->addCell(2000)->addText('Середньорічна кількість іноземних громадян серед здобувачів вищої освіти у закладі вищої освіти, які навчаються за кошти фізичних або юридичних осіб, за денною формою навчання за останні три роки (крім вищих військових навчальних закладів (закладів вищої освіти із специфічними умовами навчання), військових навчальних підрозділів закладів вищої освіти)');
    $table6->addCell(2000)->addText($this->result_6($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('7');
    $table6->addCell(2000)->addText('Середньорічна кількість громадян країн - членів Організації економічного співробітництва та розвитку - серед здобувачів вищої освіти у закладі вищої освіти, які навчаються за кошти фізичних або юридичних осіб, за денною формою навчання за останні три роки (крім вищих військових навчальних закладів (закладів вищої освіти із специфічними умовами навчання), військових навчальних підрозділів закладів вищої освіти)');
    $table6->addCell(2000)->addText($this->result_7($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('8');
    $table6->addCell(2000)->addText('Середнє значення показників індексів Гірша науково-педагогічних та наукових працівників (які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду) у наукометричних базах Scopus, Web of Science, інших наукометричних базах, визнаних МОН, приведене до кількості науково-педагогічних і наукових працівників цього закладу');
    $table6->addCell(2000)->addText($this->result_8($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('9');
    $table6->addCell(2000)->addText('Кількість науково-педагогічних та наукових працівників, які мають не менше п`яти наукових публікацій у періодичних виданнях, які на час публікації було включено до наукометричної бази Scopus або Web of Science, інших наукометричних баз, визнаних МОН, приведена до 100 науково-педагогічних і наукових працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду');
    $table6->addCell(2000)->addText($this->result_9($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('10');
    $table6->addCell(2000)->addText('Кількість наукових журналів, які входять з ненульовим коефіцієнтом впливовості до наукометричних баз Scopus, Web of Science, інших наукометричних баз, визнаних МОН, що видаються закладом вищої освіти, приведена до кількості спеціальностей, з яких здійснюється підготовка здобувачів вищої освіти у закладі вищої освіти станом на 31 грудня останнього року звітного періоду');
    $table6->addCell(2000)->addText($this->result_10($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('11');
    $table6->addCell(2000)->addText('Кількість науково-педагогічних та наукових працівників, які здійснювали наукове керівництво (консультування) не менше п`ятьох здобувачів наукових ступенів, які захистилися в Україні, приведена до 100 науково-педагогічних і наукових працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду');
    $table6->addCell(2000)->addText($this->result_11($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('12');
    $table6->addCell(2000)->addText('Кількість об`єктів права інтелектуальної власності, що зареєстровані закладом вищої освіти та/або зареєстровані (створені) його науково-педагогічними та науковими працівниками, що працюють у ньому на постійній основі за звітний період, приведена до 100 науково-педагогічних і наукових працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду');
    $table6->addCell(2000)->addText($this->result_12($ActiveZvit));
    $table6->addRow();
    $table6->addCell(2000)->addText('13');
    $table6->addCell(2000)->addText('Кількість об`єктів права інтелектуальної власності, які комерціалізовано закладом вищої освіти та/або його науково-педагогічними та науковими працівниками, які працюють у ньому на постійній основі у звітному періоді, приведена до 100 науково-педагогічних і наукових працівників, які працюють у закладі вищої освіти за основним місцем роботи станом на 31 грудня останнього року звітного періоду');
    $table6->addCell(2000)->addText($this->result_13($ActiveZvit));
    
    Storage::makeDirectory('download/zvit');

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('download/zvit/ex_tab5_' . date('dm_G') . '.docx');
    $req->session()->flash('info', 'Экспорт таблиця 5!');
    return back();
  }

}
