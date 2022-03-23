<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Support\Facades\Storage;
use App\Models\User\AddWorkers;
use Illuminate\Http\Request;

class WorkersController extends BaseController {

  public function index() {

    $select_workers_information = AddWorkers::get();

    return view('panel.ucheb.workers.index', compact([
      'select_workers_information',
    ]));
  }

  /*
   * добавка нового сотрудника с загрузкой файлов (изображений)
   */

  public function addworker(Request $request) {

    $data = $request->only(['email', 'familia', 'otchestvo', 'imya', 'depart', 'section', 'doljnost', 'telephon']);

    $files = $request->foto;

    if (empty($files))
    {
      $request->session()->flash('info', 'Співробітник додан!');
      AddWorkers::create([
        'familia'    => $data['familia'],
        'imya'       => $data['imya'],
        'otchestvo'  => $data['otchestvo'],
        'foto'       => 'default/foto.png',
        'foto_type'  => 'image/jpg',
        'department' => $data['depart'],
        'section'    => $data['section'],
        'dolzhnost'  => $data['doljnost'],
        'telefon'    => $data['telephon'],
        'email'      => $data['email'],
      ]);
    }
    else
    {
      $extension        = $files->getClientOriginalExtension();
      $file_name        = $files->getClientOriginalName();
      $foto_type        = $files->getMimeType();
      $fileSize         = $files->getSize();
      $enable_extension = ['jpg', 'png', 'jpeg'];

      $sortName     = str_before($file_name, '.' . $extension);
      $slugFilename = str_finish(date('dmyHi') . '_' . str_slug($sortName), '.' . $extension);

      if (in_array($extension, $enable_extension))
      {
        $request->session()->flash('info', 'Співробітник додан!');
        Storage::putFileAs('download/foto_workers/', $files, $slugFilename);

        AddWorkers::create([
          'familia'    => $data['familia'],
          'imya'       => $data['imya'],
          'otchestvo'  => $data['otchestvo'],
          'foto'       => $slugFilename,
          'foto_type'  => $foto_type,
          'department' => $data['depart'],
          'section'    => $data['section'],
          'dolzhnost'  => $data['doljnost'],
          'telefon'    => $data['telephon'],
          'email'      => $data['email'],
        ]);
      }
      else
      {
        $request->session()->flash('error', 'Непідруємий формат файлу!');
        return back();
      }
    }
   
    return back();
  }

  public function editworker() {
    dd('edit worker');
  }

  public function deleteworker(Request $r) {
    AddWorkers::where('id', $r->id)->delete();
    session()->flash('delete', 'Видалено!');
  }

}
