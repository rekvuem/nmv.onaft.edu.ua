<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use Illuminate\Http\Request;
use App\Models\ProjectOpp\ProjectCategory;
use App\Models\ProjectOpp\ProjectFile;
use App\Models\ProjectOpp\ProjectComments;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserPanel\BaseController;

class ProjectsOppController extends BaseController {

  public function list() {

    $projects = ProjectCategory::with('SumCommentProj', 'SumFileProj')
        ->withCount('SumCommentProj as SumProjCountComment')
        ->withCount('SumFileProj as SumProjCountFile')
        ->get();

    $showLastCommentProject = ProjectComments::orderBy('created_at', 'desc')->paginate(10);

    $random_text_color   = ['text-violet', 'text-danger', 'text-warning', 'text-info', 'text-orange', 'text-slate'];
    $random_border_color = ['border-violet', 'border-danger', 'border-warning', 'border-info', 'border-orange', 'border-slate'];
    $array_text          = array_random($random_text_color);
    $array_border        = array_random($random_border_color);

    return view('panel.ucheb.opp.project.list', compact([
      'projects',
      'showLastCommentProject',
      'array_text',
      'array_border',
    ]));
  }

  public function store(Request $request) {
    $takePage = $request->UpdateProjectFile;

    IF ($takePage == 'yes')
    {
      $date      = $request->foldering;
      $IdProject = $request->IdProject;
    } else
    {
      $date            = 'upload/' . date('dmy');
      $projectCategory = ProjectCategory::create([
            'slug'       => str_slug($request->projectname),
            'title'      => $request->projectname,
            'datecreate' => $date,
      ]);

      Storage::makeDirectory($date);
      $IdProject = $projectCategory->id;
    }



    $files = $request->InputFile;
    foreach ($files as $file)
    {
      $fileSize  = $file->getSize();
      $filename  = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $MimeType  = $file->getMimeType();

      $sortName     = str_before($filename, '.' . $extension);
      $slugFilename = str_finish(str_slug($sortName), '.' . $extension);

      ProjectFile::create([
        'projectopp_category_id' => $IdProject,
        'folder'                 => $date,
        'title'                  => $sortName,
        'filename'               => $slugFilename,
        'size'                   => $fileSize,
        'mime_type'              => $MimeType,
      ]);
      Storage::putFileAs($date, $file, $slugFilename);
    }

    //return redirect()->route('spanel.ucheb.project.list');
    return back();
  }

  /*   * **************************************************** */
  /*   * **************************************************** */

  public function showProject($takeIdProject) {

    $projects = ProjectCategory::with('SumCommentProj', 'SumFileProj')
        ->where('id_category', $takeIdProject)
        ->get();



    $showLastCommentProject = ProjectComments::orderBy('created_at', 'desc')->paginate(15);

    $ProjectChooseComment = ProjectComments::withTrashed()->orderBy('created_at', 'desc')->where('projectopp_category_id', $takeIdProject)->get();


    $random_text_color   = ['text-violet', 'text-danger', 'text-warning', 'text-info', 'text-orange', 'text-slate'];
    $random_border_color = ['border-violet', 'border-danger', 'border-warning', 'border-info', 'border-orange', 'border-slate'];

    $array_text   = array_random($random_text_color);
    $array_border = array_random($random_border_color);

    return view('panel.ucheb.opp.project.showProject', compact([
      // 'takeIdProject',
      'projects',
      'showLastCommentProject',
      'ProjectChooseComment',
      'array_text',
      'array_border',
    ]));
  }

  public function deletingFile($takeIdProject) {
    $TakeFile = ProjectFile::where('id_upload_file', $takeIdProject)->first();

    $ddd = Storage::delete($TakeFile->folder . '/' . $TakeFile->filename);
    sleep(2);
    ProjectFile::where('id_upload_file', $TakeFile->id_upload_file)->delete();

    return back();
  }

  public function deletingComment($takeIdProject) {
    ProjectComments::where('id_comment', $takeIdProject)->delete();

    return back();
  }

  public function deletingProject($takeIdProject) {

    ProjectCategory::where('id_category', $takeIdProject)->delete();
    ProjectComments::where('projectopp_category_id', $takeIdProject)->forceDelete();
    $fileProj = ProjectFile::where('projectopp_category_id', $takeIdProject)->first();


      Storage::deleteDirectory($fileProj->folder);


    return back();
  }

}
