<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use \App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Http\Request;
use App\Models\Certifacat\Cert_1;
use App\Models\Certifacat\Cert_3;
use App\Models\Certifacat\Cert_4;
use Illuminate\Support\Facades\Storage;

class CertController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $certification_select = Cert_1::with('certif2')->get();
    return view('panel.ucheb.certification.index', compact('certification_select'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    /*     * **************************************************************************** */
    IF ($request->has(['name' => 'form-second']))
    {
      $request->session()->flash('add', 'Додано!');

      $this->validate($request, [
        'forwardpredmet' => 'required',
      ]);

      Cert_3::create([
        'certification_2_id' => $request['second_level'],
        'title_third'        => $request['forwardpredmet'],
      ]);

      return back();
    }
    /*     * **************************************************************************** */
    IF ($request->has(['name' => 'form-third']))
    {

      $this->validate($request, [
        'add_certificat' => 'required',
      ]);

      IF ($request->CertifFile ?? '')
      {
        $fileUpload = $request->CertifFile;
        $fileName   = $fileUpload->getClientOriginalName();
        Storage::putFileAs('download\certification', $fileUpload, $fileUpload->getClientOriginalName());
      }
      IF ($request['have_url'] ?? '')
      {
        $fileName = $request['have_url'];
      }

      Cert_4::create([
        'certification_3_id' => $request['third_level'],
        'title_four'         => $request['add_certificat'],
        'filename'           => $fileName,
      ]);
      return back();
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request) {
    If ($request->has(['name' => 'form-edit-level3']))
    {
      $request->session()->flash('update', 'Напрям підготовки оновлено');
      $cert_3              = Cert_3::findOrFail($request['title_edit_id']);
      $cert_3->title_third = $request['edit_napryam'];

      $cert_3->save();
    }

    If ($request->has(['name' => 'form-four']))
    {
      $request->session()->flash('update', 'Сертіфікат оновлено!');
      $cert_4 = Cert_4::findOrFail($request['title_id']);
      IF ($request->CertifFile ?? '')
      {
        $fileUpload = $request->CertifFile;
        $fileName   = $fileUpload->getClientOriginalName();
        Storage::putFileAs('download\certification', $fileUpload, $fileUpload->getClientOriginalName());
      }
      IF ($request['have_url'] ?? '')
      {
        $fileName = $request['have_url'];
      }
      $cert_4->title_four = $request['add_certificat'];
      $cert_4->nzavo      = $request['chose_nzavo'];
      $cert_4->filename   = $fileName;

      $cert_4->save();
    }
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    Cert_4::where('id', $id)->delete();

    return back();
  }

}
