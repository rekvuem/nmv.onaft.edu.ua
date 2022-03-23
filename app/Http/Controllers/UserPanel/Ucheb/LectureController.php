<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use \App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Http\Request;
use App\Models\Lectures\Lecture;

class LectureController extends BaseController
{

    public function index(Request $req)
    {
//      $sud=$req->session()->put('gggg', 'eryeryeryeryeryeryeryery'); создает ссесию именно в папке
      $lecture= Lecture::where('yearadd', 20191)->paginate(12);
      return view('panel.ucheb.lecture.index', compact(['lecture']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
