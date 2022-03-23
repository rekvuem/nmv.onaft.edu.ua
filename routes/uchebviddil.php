<?php
Route::namespace('Ucheb')->prefix('/ucheb')->name('ucheb.')->middleware('can:posit-admin-role')->group(function () {
    Route::resource('/opp', 'OppController', ['except' => ['show', 'edit']]);
    Route::delete('/opp/delete/{id}', 'OppController@destroy')->name('opp.destroy');
    Route::patch('/opp/opp_upd', 'OppController@update')->name('opp.update');
    Route::resource('/news', 'NewsController', ['except' => ['edit', 'update']]);
    Route::get('/newsedit/{takeIdNews}', 'NewsController@takeedit')->name('news.edit');
    Route::patch('/newsupdate/{takeIdNews}', 'NewsController@takeupdate')->name('news.update');
    Route::resource('/plane', 'PlaneController', ['except' => ['show', 'edit', 'create', 'update']]);
    Route::patch('/plane/plane_upd', 'PlaneController@update')->name('plane.update');
    Route::resource('/certification', 'CertController', ['except' => ['show', 'edit', 'create', 'store']]);
    Route::resource('/standart', 'StandartController', ['except' => ['store', 'show', 'edit', 'create', 'update']]);
    Route::patch('/standart_ajax_upd', 'StandartController@update')->name('standart.update');
    Route::resource('/lecture', 'LectureController');  // УДАЛИТЬ?

    Route::resource('/siteupload', 'UploadController', ['except' => ['create', 'show', 'edit', 'update']]);
    Route::patch('/siteupload_ajax_upl', 'UploadController@update')->name('siteupload.update');

    Route::prefix('/olymp')->name('olympic.')->group(function () {
        Route::get('/1etap', 'OlimpController@firstetap')->name('1etap');
        Route::get('/2etap', 'OlimpController@secondtetap')->name('2etap');
        Route::get('/winner1', 'OlimpController@winner1')->name('win1');
        Route::get('/winner2', 'OlimpController@winner2')->name('win2');
        Route::post('/OlympUpdate', 'OlimpController@OlympUpdate')->name('etap.upd');
    });

    Route::prefix('/conference')->name('confer.')->group(function () {
        Route::get('/', 'ConfController@home')->name('index');
        Route::get('/files', 'ConfController@upload_file_page')->name('uplpage');
        Route::get('/edit/{editid}', 'ConfController@edit_file')->name('edit');
        Route::put('/updatefile', 'ConfController@updatefile')->name('files.update');
        Route::post('/fileupload', 'ConfController@filesupload')->name('filosupload');
        Route::put('/updateconfer', 'ConfController@updatekonfer')->name('update');
        Route::delete('/delete/{idfile}', 'ConfController@file_delete')->name('files.destroy');
    });

    //// System ProjectOpp
    Route::prefix('/projectopp')->name('project.')->group(function () {
        Route::get('/list', 'ProjectsOppController@list')->name('list');
        Route::post('/add', 'ProjectsOppController@store')->name('store');
        Route::get('/showProject/{takeIdProject}', 'ProjectsOppController@showProject')->name('show');
        Route::delete('/deletingFile/{takeIdProject}', 'ProjectsOppController@deletingFile')->name('deletedFile');
        Route::delete('/deletingCom/{takeIdProject}', 'ProjectsOppController@deletingComment')->name('deletedComment');
        Route::get('/deletingProj/{takeIdProject}', 'ProjectsOppController@deletingProject')->name('deletedProject');
    });

    Route::prefix('/college')->name('college.')->group(function () {
        Route::get('/', 'ConfController@homeCollege')->name('index');
    });

    //// Управление добавление \ удаление списком сотрудников
    Route::prefix('/workers')->name('workers.')->group(function(){
        Route::get('/', 'WorkersController@index')->name('index');
        Route::post('/addworker', 'WorkersController@addworker')->name('add');

        Route::delete('/delete_worker', 'WorkersController@deleteworker')->name('delete');
    });

    /* AJAX запросы */
    Route::post('/standart_store_ajax', 'StandartController@store',
        ['expect' => ['show', 'edit', 'create', 'update', 'destroy']])->name('standart.store');
    Route::post('/cert_post_ajax', 'CertController@store',
        ['except' => ['show', 'edit', 'create', 'update', 'destroy']])->name('certification.store');
    Route::post('/cert_update_ajax', 'CertController@update',
        ['except' => ['show', 'edit', 'create', 'store', 'destroy']])->name('certification.update');
});