<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\UserPanel\BaseController;
use App\Models\Opp\OppSpecial;
use App\Models\Opp\OppUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class OppController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $specialListOpp = OppSpecial::with('oppupl')
        ->where('type_opp', 'opp')
        ->orderBy('num','asc')
        ->orderBy('type', 'asc')
        ->get();
    $specialListOnp = OppSpecial::with('oppupl')
        ->where('type_opp', 'onp')
        ->get();

    return view('panel.ucheb.opp.opp', compact('specialListOpp', 'specialListOnp'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $specialList = OppSpecial::get();

    return view('panel.ucheb.opp.add')->with([
          'specialList' => $specialList,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, MessageBag $message) {


    IF ($request->has(['name' => 'addopp']))
    {
      $message->add('add', 'Спеціалізація додано!');
      $this->validate($request, [
        'num' => 'required',
      ]);

      OppSpecial::create([
        'type_opp'        => $request['type_opp'],
        'type'            => $request['type'],
        'num'             => $request['num'],
        'specialization'  => $request['specialization'],
        'status_download' => $request['status_download'],
      ]);

      return redirect()->route('spanel.ucheb.opp.index')->withErrors($message);
    }

    IF ($request->has(['name' => 'addspecial']))
    {
      $file = $request->FileUploadOPP;

      $this->validate($request, [
        'year' => 'required',
        'opp'  => 'required',
      ]);

      IF ($file ?? '')
      {
        OppUpload::create([
          'opp_special_id'  => $request['opp_special'],
          'opp'             => $request['opp'],
          'status_download' => $request['status_download'],
          'filename'        => $file->getClientOriginalName(),
          'year'            => $request['year'],
        ]);
        Storage::putFileAs('opp/', $file, $file->getClientOriginalName());
      } else
      {
        OppUpload::create([
          'opp_special_id'  => $request['opp_special'],
          'opp'             => $request['opp'],
          'status_download' => $request['status_download'],
          'year'            => $request['year'],
        ]);
      }


      return redirect()->route('spanel.ucheb.opp.index');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request 
   * @param  \App\Models\Opp\OppSpecial  
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $req) {

    if ($req->has(['name' => 'update_special']))
    {

      $updateSpecial = OppSpecial::findOrFail($id);

      $updateSpecial->type_opp        = $req->input('type_opp');
      $updateSpecial->num             = $req->input('num');
      $updateSpecial->specialization  = $req->input('specialization');
      $updateSpecial->status_download = $req->input('status_download');
      $updateSpecial->type            = $req->input('type');

      $updateSpecial->save();
    }


    IF ($req->has(['name' => 'update_upload']))
    {
      $id           = $req->oppupdate;
      $updateUpload = OppUpload::find($id);

      $updateUpload->opp             = $req->input('specialization');
      $updateUpload->status_download = $req->input('status_download');
      $updateUpload->year            = $req->input('year');
      $fileUpdate                    = $req->FileUploadOPP;
      if ($fileUpdate ?? '')
      {
        Storage::putFileAs('opp/', $fileUpdate, $fileUpdate->getClientOriginalName());
        $updateUpload->filename = $fileUpdate->getClientOriginalName();
      }

      $updateUpload->save();
    }

    return redirect()->route('spanel.ucheb.opp.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Opp\OppSpecial  $oppSpecial
   * @return \Illuminate\Http\Response
   */
  public function destroy($id, Request $req) {

    IF($req->has(['name'=>'delete_opp']))
    {
      OppSpecial::where('id', $id)->delete();
      OppUpload::where('opp_special_id', $id)->delete();
    }
    IF ($req->has(['name' => 'delete_row']))
    {
      OppSpecial::where('id', $id)->delete();
    }
    IF ($req->has(['name' => 'delete_row_opp']))
    {
      OppUpload::where('id', $id)->delete();
      Storage::delete('opp/' . $req->fname);
    }
    return redirect()->route('spanel.ucheb.opp.index');
  }

}
