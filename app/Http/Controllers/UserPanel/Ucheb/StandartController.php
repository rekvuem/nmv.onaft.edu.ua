<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Standart\Standart_1;
use App\Models\Standart\Standart_2;
use App\Models\Standart\Standart_3;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\Gate;

class StandartController extends Controller {

  public function index() {
    $SelectStandart = Standart_1::with('standart_2')->get();
    return view('panel.ucheb.standart.index', compact('SelectStandart'));
  }

  public function store(Request $request) {
    /*     * ***************************************************** */
    if ($request->has(['name' => 'form-add-standart']))
    {
      $this->validate($request, [
        'addstandart' => 'required',
      ]);

      $file = $request->StandartFile;
      $request->session()->flash('add', 'Інформація додано!');
      if ($file ?? '')
      {
        Standart_3::create([
          'standart_2_id' => $request['rowidlevel2'],
          'title'         => $request['addstandart'],
          'filename'      => $file->getClientOriginalName(),
        ]);
        Storage::putFileAs('download/standart', $file, $file->getClientOriginalName());
      } else
      {
        Standart_3::create([
          'standart_2_id' => $request['rowidlevel2'],
          'title'         => $request['addstandart'],
          'filename'      => $request['urlstandart'],
        ]);
      }
      return redirect()->route('spanel.ucheb.standart.index');
    }
    /*     * ******************************************************* */
  }

  public function update(Request $request) {
    $id = $request->standart;

    $request->session()->flash('info', 'Данні оновлені!');

    if ($request->has(['name' => 'form-edit-standart']))
    {

      $updateStandart        = Standart_3::findOrFail($id);
      $file                  = $request->StandartFile;
      $updateStandart->title = $request['standarttitle'];
      if ($file ?? '')
      {
        $updateStandart->filename = "/download/standart/".$file->getClientOriginalName();
        Storage::putFileAs('download/standart', $file, $file->getClientOriginalName());
      } else
      {
        $updateStandart->filename = $request['urlstandart'];
      }
      $updateStandart->save();
    }
    if ($request->has(['name' => 'form-edit-special']))
    {

      $updateStand2               = Standart_2::findOrFail($id);
      $updateStand2->title_second = $request['specialtitle'];

      $updateStand2->save();
    }

    return redirect()->route('spanel.ucheb.standart.index');
  }

  public function destroy($id, Request $request) {

    if ($request->has(['name' => 'delete_lev3']))
    {

      Standart_3::where('id', $id)->delete();
      Storage::delete('/download/standart/' . $request->fname);


      $request->session()->flash('delete', 'Данні видалені!');
      return redirect()->route('spanel.ucheb.standart.index');
    }


    if ($request->has(['name' => 'delete_lev2']))
    {

      Standart_2::where('id', $id)->delete();

      $request->session()->flash('delete', 'Данні видалені!');
      return redirect()->route('spanel.ucheb.standart.index');
    }
  }

}
