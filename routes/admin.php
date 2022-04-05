<?php
Route::namespace('Admin')->prefix('/admin')->name('admin.')->middleware('can:posit-admin-role')->group(function () {
    Route::resource('/users', 'UserController', ['except' => ['create', 'show', 'update']]);

    Route::put('/update_from_trash/{id}','UserController@reestablish')->name('reestablish');
    Route::get('/import_xls', 'ImportXlsController@index')->name('import.xls');
    Route::put('/data_import_xls','ImportXlsController@inport_data')->name('inport_data.xls');

    Route::get('/pages', 'PageController@index')->name('page_index');
    Route::post('/savepage', 'PageController@store')->name('page_save');
    Route::put('/pageupd/{id}', 'PageController@update')->name('page_upd');

    Route::put('/users_update/{user}', 'UserController@userUpdate')->name('users.update');
    Route::get('/controll', 'PanelController@index')->name('welcome');

    //// Artisan commands start
    Route::get('/startSeed', function () {
        Artisan::call('db:seed');
        return redirect()->route('spanel.admin.welcome');
    })->name('StartSeed');

    Route::get('/startMigrate', function(){
        Artisan::call('migrate');
        return redirect()->route('spanel.admin.welcome');
    })->name('getMigrate');
    Route::get('/startMigrateRefresh', function(){
        Artisan::call('migrate:refresh');
        return redirect()->route('spanel.admin.welcome');
    })->name('getMigrateRefresh');
    Route::get('/startMigrateRollback', function(){
        Artisan::call('migrate:rollback');
        return redirect()->route('spanel.admin.welcome');
    })->name('getMigrateRollback');


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