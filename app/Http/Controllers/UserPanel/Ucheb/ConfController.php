<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Storage;

class ConfController extends Controller {

  public function home(Request $request) {
    $selDB = DB::table('confer_home')->where('id', 1)->first();
    return view('panel.ucheb.conference.index', compact('selDB'));
  }

  public function homeCollege(Request $request) {
    $selDB = DB::table('confer_home')->where('id', 2)->first();
    return view('panel.ucheb.college.index', compact('selDB'));
  }

  public function upload_file_page(Request $request) {
    $uploadFile = DB::table('confer_files')->paginate(5);
    return view('panel.ucheb.conference.uplpage', compact('uploadFile'));
  }

  public function updatekonfer(Request $request) {
    $request->session()->flash('info', 'Данні конференції оновлено.');

    IF ($request->textid == 1)
    {
      $UpdateRow = DB::table('confer_home')
          ->where('id', 1)
          ->update([
        "title"                    => $request->conf_title,
        "title_short"              => $request->conf_title_short,
        "title_conference"         => $request->conf_title_long,
        "date_conference"          => $request->conf_date,
        "priority_work_conference" => $request->priority_work_conference,
        "work_conference"          => $request->work_conference,
        "requirements"             => $request->requirements,
        "comitet"                  => $request->comitet,
        "reglament"                => $request->reglament
      ]);
    }

    IF ($request->textid == 2)
    {
      $UpdateRow = DB::table('confer_home')
          ->where('id', 2)
          ->update([
        "title"                    => $request->conf_title,
        "title_short"              => $request->conf_title_short,
        "title_conference"         => $request->conf_title_long,
        "date_conference"          => $request->conf_date,
        "priority_work_conference" => $request->priority_work_conference,
        "work_conference"          => $request->work_conference,
        "requirements"             => $request->requirements,
        "comitet"                  => $request->comitet,
        "reglament"                => $request->reglament
      ]);
    }

    return back();
  }

  public function updatefile(Request $request) {
    $request->session()->flash('info', 'Данні оновлено.');
    $SelectFile = DB::table('confer_files')
        ->where('id', $request->idfile)
        ->first();

    $UpdateFile = DB::table('confer_files')
        ->where('id', $SelectFile->id)
        ->update([
      "name"        => $request->first_name_file,
      "discribtion" => $request->second_name_file,
      "page"        => $request->forpage,
      "active"      => $request->activefile,
      "updated_at"  => now(),
    ]);

    return redirect()->route('spanel.ucheb.confer.uplpage');
  }

  public function filesupload(Request $request) {
    $request->session()->flash('add', 'Файл завантажен!');
    $select_page_confer = $request->input('forpage');
    $files              = $request->InputFile;

    $fileSize         = $files->getSize();
    $filename         = $files->getClientOriginalName();
    $extension        = $files->getClientOriginalExtension();
    $MimeType         = $files->getMimeType();
    $sortName         = str_before($filename, '.' . $extension);
    $slugFilename     = str_finish(str_slug($sortName), '.' . $extension);
    $enable_extension = ['pdf', 'png', 'jpg', 'jpeg'];
    $MaxSizeFile      = 10000000;

    if (in_array($extension, $enable_extension))
    {
      if ($fileSize <= $MaxSizeFile)
      {
        $request->session()->flash('add', 'Файл успішно завантажен!');
        DB::table('confer_files')->insert([
          "name"        => $request->first_name_file,
          "discribtion" => $request->second_name_file,
          "file"        => $files->getClientOriginalName(),
          "page"        => $request->forpage,
          "active"      => "0",
          "type"        => $files->getMimeType(),
          "created_at"  => now(),
        ]);

        IF ($select_page_confer == 'certificat')
        {
          Storage::putFileAs('download/confer/certificat/', $files, $slugFilename);
        } else
        {
          Storage::putFileAs('download/confer/', $files, $slugFilename);
        }
      } else
      {
        $request->session()->flash('error', 'Файл вантажить більше 10Mb!');
        return redirect()->route('spanel.ucheb.confer.uplpage');
      }
      return redirect()->route('spanel.ucheb.confer.uplpage');
    } else
    {
      abort(403, 'Не підримуванний формат файлу');
      return back();
    }
  }

  public function edit_file($editid) {
    $SelectRowFile = DB::table('confer_files')
        ->where('id', $editid)
        ->first();

    return view('panel.ucheb.conference.edit', compact('SelectRowFile'));
  }

  public function file_delete(Request $request, $idfile) {

    $SelectRow = DB::table('confer_files')
        ->where('id', $idfile)
        ->first();

    $DeleteRow = DB::table('confer_files')
            ->where('id', $SelectRow->id)->delete();

    $select_page_confer = $request->input('page');

    IF ($select_page_confer == 'certificat')
    {
      Storage::delete('download/confer/certificat/' . $SelectRow->file);
    }
    Storage::delete('download/confer/' . $SelectRow->file);

    return redirect()->route('spanel.ucheb.confer.uplpage');
  }

}
