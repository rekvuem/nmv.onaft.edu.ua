<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Session::put('locale', 'uk');
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
})->name('local.switch');

Route::group([
    'prefix'     => '/',
    'namespace'  => 'Home',
    'middleware' => 'log.route'
], function () {

    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/newslist', 'HomeController@news')->name('home.newslist');
    Route::get('/newsshow/{title_slug}', 'HomeController@newsshow')->name('home.newslist.show');
    Route::get('/publicinfo', 'HomeController@info');
    Route::get('/osvitab', 'HomeController@osvitab');  //освіта бакалавр
    Route::get('/osvitam', 'HomeController@osvitam');  //освіта магістрів
    Route::get('/aboutus', 'HomeController@aboutus');  //страница "про нас"
    Route::get('/project', 'HomeController@project_list')->name('home.projectlist');
    Route::get('/projectshow/{project_slug}', 'HomeController@project_show')->name('home.showproject');
    Route::post('/addcomment', 'HomeController@project_addcomment')->name('home.addcomment');
    Route::get('/zop', 'HomeController@zop')->name('home.zop');
    Route::get('/actualdp', 'HomeController@actualdp')->name('home.actualdp');
    Route::get('/metodrada', 'HomeController@metodrada');  //страница "методична рада" \ один
    Route::get('/grafikonaft', 'HomeController@grafikonaft');
    Route::get('/ukrsertificat', function () {
        return view('home.ukrsertif');
    })->name('home.ukrsert');
    Route::get('/info', 'HomeController@info_help')->name('home.info');
    Route::get('/garantop', function () {
        return view('home.garantop');
    })->name('home.garantop');                                                                      //Гаранту ОП
    Route::get('/dobro', 'HomeController@dobro')->name('home.dobro');                               //Актуально про доброчесність
    Route::get('/monitoring', 'HomeController@monitoring')->name('home.monitoring');                //моніторінг
    Route::get('/bests_teachers', 'HomeController@bestteachears')->name('home.bestteachears');      //Кращій профессори, доцент
    Route::get('/bests_laboratory', 'HomeController@bestlaboratory')->name('home.bestlaboratory');  //Результати огляд-конкурс на кращу навчальну лабораторію
    Route::get('/openlecture', 'HomeController@openlec')->name('home.open.lecture');                //сторінка план відкритих лекцій
    Route::get('/seminar', 'HomeController@seminar')->name('home.seminar');
    Route::get('/diplom', 'HomeController@listdiplomas')->name('home.diplom');
    Route::get('/aboutworker', 'HomeController@aboutworker')->name('home.workers');
    //Документация
    Route::get('/documantation', 'DocumController@index')->name('home.docum');
    /* форма заявки на регистрацию пользвателя */
    Route::get('/leave_register_form', 'HomeController@leave_reg_form')->name('home.leaveRegForm');
    Route::post('/insert_form_user', 'HomeController@insert_reg_form')->name('home.InsertRegForm');
    /* структура страниц с префиксом /plane/ */
    Route::get('/plane', 'Plane\PlaneController@index')->name('home.plane');
    /* отдельная страница для олимпиады  */
    Route::group(['prefix' => '/olymp'], function () {
        Route::get('/1etap', 'HomeController@olymp1etap')->name('home.olymp.1etap');
        Route::get('/2etap', 'HomeController@olymp2etap')->name('home.olymp.2etap');
        Route::get('/invite', 'HomeController@inviteolymp')->name('home.olymp.invite');
        Route::get('/collage', 'HomeController@basecollage')->name('home.olymp.basecollage');
        Route::get('/winner1', 'HomeController@winner1olymp')->name('home.olymp.win1');
        Route::get('/winner2', 'HomeController@winner2olymp')->name('home.olymp.win2');
    });
});
/* отправка почты */
Route::group([
    'prefix'    => '/mail',
    'namespace' => 'Mail'
], function () {
    Route::get('/sendMail/{email}', 'HelloSenderController@thxForQuestionary')->name('mail.helloMSG');
    Route::get('/sendCancelMail/{email}', 'HelloSenderController@CancelQuestionary')->name('mail.cancelMSG');
});

/* отдельная группа страниц для конференций академии   */
Route::group([
    'prefix'     => '/conference',
    'namespace'  => 'Conference',
    'middleware' => 'log.route'
], function () {
    Route::get('/', 'ConferenceController@index');
    Route::get('/komitet', 'ConferenceController@komitet');
    Route::get('/reglament', 'ConferenceController@reglament');
    Route::get('/programm', 'ConferenceController@programm');
    Route::get('/sxem', 'ConferenceController@sxem');
    Route::get('/tezici', 'ConferenceController@tezici');
    Route::get('/archiv', 'ConferenceController@archiv');
    Route::get('/certificat', 'ConferenceController@cerficat');
});

/* отдельная группа страниц для конференции колледжей */
Route::group([
    'prefix'    => '/college',
    'namespace' => 'College'
], function () {
    Route::get('/', 'CollegeController@home');
    Route::get('/komitet', 'CollegeController@komitet');
    Route::get('/programm', 'CollegeController@programm');
    Route::get('/tezici', 'CollegeController@tezici');
    Route::get('/stends', 'CollegeController@stends');
});

/* * *********************************************************************** */
/* * *********************************************************************** */
/* * *************************** USERPANEL ********************************* */
Auth::routes(['register' => TRUE]);

Route::namespace('UserPanel')->prefix('/spanel')->name('spanel.')->middleware([
    'auth',
])->group(function () {
    Route::get('/', 'WelcomeController@dashboard')->name('dashboard');
    Route::get('/setting', 'SettingUserController@index')->name('setting');  //настройка пользователя (смена имени, пароля и т.д.)
    Route::put('/setting_save', 'SettingUserController@update')->name('setting.save'); //сохранение обновленной инфорации о пользователе
    Route::put('/setting_pass', 'SettingUserController@store')->name('setting.pass'); // сохранение измененного пароля

    Route::namespace('Report')->prefix('/report')->name('report.')->group(function () {
        Route::get('/', 'ReportUserController@index')->name('dashboard');
        Route::get('/myreport', 'ReportShowController@index')->name('myreports');

        Route::middleware('can:posit-chief')->get('/allreport', 'ReportAllController@index')->name('allreports');
    });


    include __DIR__.'/uchebviddil.php';
    include __DIR__.'/zvit.php';
    include __DIR__.'/admin.php';

});
