<?php

namespace App\Http\Controllers\UserPanel\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\UserPanel\BaseController;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportXlsController extends BaseController {

  public function index() {
    $select_special = DB::table('active_diploms_special')->get();
    return view('panel.admin.import_xls', compact('select_special'));
  }

  
  public function inport_data(Request $req){
            $req_special = $req->input('special');
            $req_year = $req->input('year');
            
       $this->validate($req, [
           'uploaded_file' => 'required|file|mimes:xls,xlsx'
       ]);

       $the_file = $req->file('uploaded_file');
       try{
         
           $spreadsheet = IOFactory::load($the_file->getRealPath());
           $sheet        = $spreadsheet->getActiveSheet();
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_range    = range( 1, $row_limit );
           $column_range = range( 'A', $column_limit );
           $startcount = 1;

           $data = [];
           
           foreach ( $row_range as $row ) {
               $data[] = [
                   'active_year' => $req_year,
                   'id_dp_active' => $req_special,
                   'title' => $sheet->getCell( 'A' . $row )->getValue(),
               ];
               
               
               $startcount++;
           }
           DB::table('active_diploms_topics')->insert($data);
       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
           return back()->withErrors('There was a problem uploading the data!');
       }
       return back()->withSuccess('Great! Data has been successfully uploaded.');

  }
  
}
