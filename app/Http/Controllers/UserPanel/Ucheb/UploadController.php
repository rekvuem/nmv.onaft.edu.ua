<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\UserPanel\BaseController;
use App\Models\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends BaseController {

  public function index(Request $req) {

    $uplFile = \DB::table('site_files')
        ->leftJoin('pages', 'site_files.page', '=', 'pages.page')
        ->orderBy('updated_at', 'desc')
        ->get();

    return view('panel.ucheb.upload.index', compact(['uplFile']));
  }

  public function store(Request $request) {

    $request->session()->flash('add', 'Файл завантажен!');
    $files = $request->InputFile;

    $extension        = $files->getClientOriginalExtension();
    $fileSize         = $files->getSize();
    $enable_extension = ['pdf', 'doc', 'docx', 'pptx', 'jpg', 'png', 'xls', 'jpeg'];
    $MaxSizeFile      = 15000000;

    if (in_array($extension, $enable_extension))
    {

      if ($fileSize <= $MaxSizeFile)
      {
        $request->session()->flash('add', 'Файл успішно завантажен!');
        if ($request->selectPage == "inviteolymp")
        {
          UploadFiles::create([
            'page'     => $request['selectPage'],
            'side'     => 'olymp',
            'title'    => $request['InputTitle'],
            'filename' => $files->getClientOriginalName(),
            'type'     => $files->getMimeType()
          ]);
          Storage::putFileAs('download/olymp/', $files, $files->getClientOriginalName());
        }
        elseif($request->selectPage == "olymp"){
          UploadFiles::create([
            'page'     => $request['selectPage'],
            'side'     => 'olymp',
            'title'    => $request['InputTitle'],
            'filename' => $files->getClientOriginalName(),
            'type'     => $files->getMimeType()
          ]);
          Storage::putFileAs('download/olymp/', $files, $files->getClientOriginalName());
        }
        elseif ($request->selectPage == "coopagree")
        {
          UploadFiles::create([
            'page'     => $request['selectPage'],
            'side'     => 'coopagree',
            'title'    => $request['InputTitle'],
            'filename' => $files->getClientOriginalName(),
            'type'     => $files->getMimeType()
          ]);
          Storage::putFileAs('download/coopagree/', $files, $files->getClientOriginalName());
        }
        else
        {
          UploadFiles::create([
            'page'     => $request['selectPage'],
            'side'     => 'site',
            'title'    => $request['InputTitle'],
            'filename' => $files->getClientOriginalName(),
            'type'     => $files->getMimeType()
          ]);
          Storage::putFileAs('download/site/', $files, $files->getClientOriginalName());
        }

      }
      else
      {
        $request->session()->flash('error', 'Файл вантажить більше 15Mb!');
        return back();
      }


      return redirect()->route('spanel.ucheb.siteupload.index');
    }
    else
    {
      abort(403, 'Не підримуванний формат файлу');
      return back();
    }
  }

  public function update(Request $request) {
    $siteupload = $request->siteupload;
    $request->session()->flash('update', 'Оновлено!');

    $file     = $request->InputFile;
    $filename = $request->filename;

    $UpdateFile             = UploadFiles::findOrFail($siteupload);
    $UpdateFile->page       = $request->selectPage;
    $UpdateFile->title      = $request->titleFile;
    $UpdateFile->updated_at = now();

    if ($request->InputFile ?? '')
    {
      $UpdateFile->filename = $file->getClientOriginalName();
      $UpdateFile->type     = $file->getMimeType();
      Storage::delete('download/site/' . $filename);
      sleep(2);
      Storage::putFileAs('download/site/', $file, $file->getClientOriginalName());
    }
    else
    {
      
    }
    $UpdateFile->save();
    return back();
  }

  public function destroy(Request $req) {
    $select_delete = UploadFiles::where('id', $req->id)->first();
    
    UploadFiles::where('id', $select_delete->id)->delete();
    Storage::delete('download/'.$select_delete->side.'/' . $req->filename);

    return back();
  }

}
