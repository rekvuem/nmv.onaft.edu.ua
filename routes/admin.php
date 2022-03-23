<?php
Route::namespace('Admin')->prefix('/admin')->name('admin.')->middleware('can:posit-admin-role')->group(function () {
    Route::resource('/users', 'UserController', ['except' => ['create', 'show', 'update']]);

    Route::get('/import_xls', 'ImportXlsController@index')->name('import.xls');
    Route::put('/data_import_xls','ImportXlsController@inport_data')->name('inport_data.xls');

    Route::get('/pages', 'PageController@index')->name('page_index');
    Route::post('/savepage', 'PageController@store')->name('page_save');
    Route::put('/pageupd/{id}', 'PageController@update')->name('page_upd');

    Route::put('/users_update/{user}', 'UserController@userUpdate')->name('users.update');
    Route::get('/controll', 'PanelController@index')->name('welcome');
    Route::get('/user_status/{formleave}', 'CheckUserFormController@status_accept')->name('user_status');
    Route::get('/user_form_delete/{formleave}', 'CheckUserFormController@status_delete')->name('user_delete');
    Route::get('/user_form_denied/{formemail}', 'CheckUserFormController@status_denied')->name('status_denied');

    //// Artisan commands start
    Route::get('/startSeed', function () {
        Artisan::call('db:seed');
        return redirect()->route('spanel.admin.welcome');
    })->name('StartSeed');

    Route::get('/getClear', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return redirect()->route('spanel.admin.welcome');
    })->name('getClear');

    Route::get('/deleteFilos', function (Request $req) {
        Storage::delete($req->fileDeleteName);
        return redirect()->route('spanel.admin.welcome');
    })->name('getDelete');
});