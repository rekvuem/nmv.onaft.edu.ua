<?php
//old version (delete)
namespace App\Http\Controllers\UserPanel\Admin;

use App\Http\Controllers\UserPanel\BaseController;
use App\Models\UploadFiles;
use Illuminate\Http\Request;
//use Illuminate\Http\File;
//use Illuminate\Support\Facades\File as FileFacades;
use Illuminate\Support\Facades\Storage;

class UploadController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $files = Storage::allFiles('download');
    return view('panel.admin.upload.upload')->with(['files'=>$files]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //  dd($request->filesupl->getClientOriginalName());
    //Storage::putFileAs('public', $request->filesupl, $request->filesupl->getClientOriginalName()); с сохранением названия файла
    //Storage::put('download', $request->filesupl);
    $files= $request->InputFile;    
    foreach ($files as $file){
      Storage::put('download', $file);
    }
    

    return redirect()->route('spanel.admin.upload.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\UploadFiles  $uploadFiles
   * @return \Illuminate\Http\Response
   */
  public function show(UploadFiles $uploadFiles) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\UploadFiles  $uploadFiles
   * @return \Illuminate\Http\Response
   */
  public function edit(UploadFiles $uploadFiles) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\UploadFiles  $uploadFiles
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, UploadFiles $uploadFiles) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\UploadFiles  $uploadFiles
   * @return \Illuminate\Http\Response
   */
  public function destroy(UploadFiles $uploadFiles) {
    //
  }

}
