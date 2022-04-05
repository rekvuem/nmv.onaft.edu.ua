<?php

namespace App\Http\Controllers\Home;

Use Illuminate\Http\Request;
use App\Models\News\NewsShow;
use App\Models\UploadFiles;
use Illuminate\Support\Facades\DB;
use App\Models\Opp\OppSpecial;
use App\Models\Certifacat\Cert_1;
use App\Models\Plane\Plane_1;
use App\Models\Standart\Standart_1;
use App\Models\Pages;
use App\Models\User\AddWorkers;
use App\Models\Home\ActiveSpecial;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectOpp\ProjectCategory;
use App\Models\ProjectOpp\ProjectComments;
use App\Models\ProjectOpp\ProjectFile;

//use Illuminate\Support\Facades\Log;

class HomeController extends BaseController {

  public function index() {
    $ListNews = NewsShow::with('newsimg')->orderByDesc('id')->paginate(3);
    return view('home.welcome', compact('ListNews'));
  }

  public function news() {
    $ListNews = NewsShow::with('newsimg')->paginate(5);
    return view('home.news', compact('ListNews'));
  }

  public function newsshow($slug_title) {
    $FindList = NewsShow::where('title_slug', $slug_title)->first();
    $show     = NewsShow::with('newsimg')->where('id', $FindList->id)->get();
    return view('home.newsshow', compact('show'));
  }

  public function info_help() {
    $FileShow = UploadFiles::where('page', 'info_support')->get();

    return view('home.info', compact('FileShow'));
  }

  public function info() {
    $FileShow             = UploadFiles::where('page', 'monitoring')->where('side', 'site')->first();
    $certification_select = Cert_1::with('certif2')->get();
    $PlaneIndex           = Plane_1::with('plane_2')->get();
    $SelectStandart       = Standart_1::with(['standart_2' => function ($query) {
            $query->orderBy('title_second', 'asc');
          }])->get();

    return view('home.publicinfo', compact([
      'FileShow', 'certification_select', 'PlaneIndex', 'SelectStandart'
    ]));
  }

  public function osvitab() {
    $specialListOpp = OppSpecial::with(['oppupl' => function ($query) {
            $query->orderBy('year', 'asc');
          }])->where('type_opp', 'opp')
        ->where('type', 'b')
        ->orderBy('num', 'asc')
        ->get();
    return view('home.osvitab', compact([
      'specialListOpp'
    ]));
  }

  public function osvitam() {
    $specialListOpp = OppSpecial::with('oppupl')->where('type_opp', 'opp')->where('type', 'm')->orderBy('num', 'asc')->get();
    $specialListOnp = OppSpecial::with('oppupl')
            ->where('type_opp', 'onp')
            ->where('type', 'm')
            ->where('status_download', 'ok')->get();

    return view('home.osvitam', compact([
      'specialListOpp', 'specialListOnp'
    ]));
  }

  //страница про нас
  public function aboutus() {
    return view('home.aboutus');
  }

  public function genUrl() {
    SitemapGenerator::create('http://nmv.onaft.edu.ua')->writeToFile('sitemap.xml');
    return back();
  }

  public function dobro(Request $req) {
    $page       = $req->query('dobro');
    $SelectPage = Pages::where('page', $page)->first();
    $UploadFile = UploadFiles::where('page', $page)->orderBy('updated_at', 'ASC')->get();
    return view('home.dobro', compact(['SelectPage', 'UploadFile']));
  }

  //Відкриті лекції
  public function openlec(Request $req) {
    $page       = $req->query('page');
    $UploadFile = UploadFiles::where('page', $page)->orderBy('updated_at', 'desc')->get();
    $SelectPage = Pages::where('page', $page)->first();

    return view('home.openlecture', compact(['UploadFile', 'SelectPage']));
  }

  //Робота екзаменаційних комісій
  public function zop(Request $req) {
    $page       = $req->query('site');
    $UploadFile = UploadFiles::where('page', $page)->orderBy('updated_at', 'desc')->get();
    $SelectPage = Pages::where('page', $page)->first();
    return view('home.zop', compact(['UploadFile', 'SelectPage']));
  }

  //страница методический совет
  public function metodrada() {
    return view('home.metodrada');
  }

  //Страничка о сотрудниках отдела
  public function aboutworker() {
    $Workers_by_group = AddWorkers::where('dolzhnost', 'Начальник')->get();
    $Select_group_com = AddWorkers::where('section', 'Коп`ютерна группа')->get();
    return view('home.workers', compact(['Workers_by_group', 'Select_group_com']));
  }

  //Комплексний план ОНАХТ
//  public function grafikonaft() {
//    return view('home.grafikonaft');
//  }
  //Семінар
  public function seminar(Request $req) {

    $page       = $req->query('site');
    $UploadFile = UploadFiles::where('page', $page)->get();

    return view('home.seminar', compact([
      'UploadFile',
    ]));
  }

  //Публічна інформація
  //Актуальні теми дипломів
  public function actualdp(Request $request) {
    $year            = $request->query('year');
    $active_diplomas = ActiveSpecial::with('topicses')
        ->whereHas('topicses', function ($w) use ($year) {
          $w->where('active_year', '=', $year);
        })
        ->where('show', '=', 'y')
        ->get();
    return view('home.actualdp', compact(['active_diplomas']));
  }

  // теми дипломів
  public function listdiplomas(Request $request) {

    $spec = $request->query('spec');
    $year = $request->query('year');

    IF ($spec == 'bak')
    {
      $diplomas_bak = DB::table('thems_list_bak')->where('year', $year)->get();
    }
    elseif ($spec == 'spec')
    {
      $diplomas_bak = DB::table('thems_list_spec')->where('year', $year)->get();
    }
    elseif ($spec == 'mag')
    {
      $diplomas_bak = DB::table('thems_list_mag')->where('year', $year)->get();
    }

    return view('home.dp', compact(['diplomas_bak']));
  }

//  monitoring Страница для показа загруженных файлов по мониторингу
  public function monitoring(Request $req) {
    $page       = $req->query('site');
    $UploadFile = UploadFiles::where('page', $page)->orderBy('updated_at', 'desc')->get();
    $SelectPage = Pages::where('page', $page)->first();
    return view('home.monitoring', compact([
      'UploadFile', 'SelectPage'
    ]));
  }

//  
  public function bestteachears() {
    return view('home.bests_raiting.teacher');
  }

//  
  public function bestlaboratory() {
    return view('home.bests_raiting.laboratory');
  }

  /*   * ************************************ */
  /*   * ************ ОЛИМПИАДА ************* */
  /*   * ************************************ */

  public function olymp1etap() {
    $SelectDB = DB::table('olympic_text')->where('page', '1etap')->first();
    return view('home.olymp.1etap', compact('SelectDB'));
  }
///////////////
  public function olymp2etap() {
    $SelectDB = DB::table('olympic_text')->where('page', '2etap')->first();
    return view('home.olymp.2etap', compact('SelectDB'));
  }
////////////////
  public function inviteolymp() {
    $InviteOlymp = DB::table('site_files')->where('page', 'inviteolymp')->get();
    return view('home.olymp.invite', compact('InviteOlymp'));
  }
///////////////
  public function basecollage() {
    $InviteBaseOlymp = DB::table('site_files')->where('page', 'olympdocum')->get();
    return view('home.olymp.base_collage', compact('InviteBaseOlymp'));
  }
///////////////
  public function winner1olymp() {
    return view('home.olymp.winner1');
  }
///////////////
  public function winner2olymp() {
    return view('home.olymp.winner2');
  }

  /*   * ************************************ */
  /*   * ************ ПРОЕКТИ ************* */
  /*   * ****** сторінка на головному сайті для відображення проектів ****** */

  /* показать весь список проекта */

  public function project_list() {
    $projects = ProjectCategory::get();
    return view('home.project.list', compact(['projects']));
  }

  /* показать выбранный проект */

  public function project_show($project_slug) {

    $project_show    = ProjectCategory::where('slug', $project_slug)->first();
    $project_file    = ProjectFile::where('projectopp_category_id', $project_show->id_category)->get();
    $project_comment = ProjectComments::withTrashed()
            ->where('projectopp_category_id', $project_show->id_category)
            ->orderBy('created_at', 'desc')->paginate(15);

    return view('home.project.showproject', compact(['project_show', 'project_comment', 'project_file']));
  }

  /* добавить комментарий */

  public function project_addcomment(Request $request) {
    // session(['username' => $request->name]);
    $request->session()->put('username', $request->name);
    $messages = [
      'name.regex'    => 'Вибачте, :input але такий вид даних не підтримується',
      'comment.regex' => 'Вибачте, :input але такий вид даних не підтримується',
    ];

    $rules = [
      'name'    => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'comment' => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
    ];

    Validator::make($request->all(), $rules, $messages)->validate();

    $projectComment = ProjectComments::create([
          'projectopp_category_id' => $request->projectid,
          'username'               => $request->name,
          'comment_text'           => $request->comment,
          'comment_parent_id'      => null,
    ]);

    return back();
  }

}
