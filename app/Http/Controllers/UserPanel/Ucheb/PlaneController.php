<?php

namespace App\Http\Controllers\userpanel\ucheb;

use App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Http\Request;
use App\Models\Plane\Plane_1;
use App\Models\Plane\Plane_3;
use App\Models\Plane\Plane_4;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;

class PlaneController extends BaseController {

  public function index() {
    $StandartIndex = Plane_1::with('plane_2')->get();
    return view('panel.ucheb.plane.index', compact('StandartIndex'));
  }

  public function store(Request $request, MessageBag $msg) {

    $request->session()->flash('update', 'Данні оновлені!');

    IF ($request->has(['name' => 'form-disp']))
    {

      $this->validate($request, [
        'discipl' => 'required',
      ]);

      Plane_3::create([
        'plane_2_id'    => $request['rowid'],
        'title_predmet' => $request['discipl'],
      ]);

      return back();
    }

    IF ($request->has(['name' => 'form-silus']))
    {
      $this->validate($request, [
        'silabus' => 'required',
      ]);

      $fileUpload = $request->fileSilabus1;

      Plane_4::create([
        'plane_3_id' => $request->input('silusid'),
        'title_file' => $request->input('silabus'),
        'filename'   => $fileUpload->getClientOriginalName(),
      ]);
      Storage::putFileAs('download/plane', $fileUpload, $fileUpload->getClientOriginalName());

      return redirect()->route('spanel.ucheb.plane.index');
    }
  }

  public function update(Request $request) {
    $id = $request->planeid;

    $request->session()->flash('update', 'Данні оновлені!');

    $plane4 = Plane_4::find($id);
    IF ($request->fileSilabus ?? '')
    {
      $fileUpload = $request->fileSilabus;
    }

    $plane4->title_file = $request->input('silabuswork');

    IF ($request->fileSilabus ?? '')
    {
      $plane4->filename = $fileUpload->getClientOriginalName();
    }

    $plane4->save();

    IF ($request->fileSilabus ?? '')
    {
      Storage::putFileAs('download/plane', $fileUpload, $fileUpload->getClientOriginalName());
    }

    return back();
  }

  public function destroy($id) {
    //
  }

}
