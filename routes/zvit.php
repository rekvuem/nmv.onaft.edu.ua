<?php
Route::namespace('Zvit')->prefix('/zvit')->name('zvit.')->middleware('can:depart-zvit-role,posit-admin-role')->group(function () {
    Route::get('/', 'ZvitController@index')->name('index');
    Route::get('/activeyear', 'ZvitController@activeyear')->name('ActiveYear');
    Route::get('/list', 'ZvitController@listfs')->name('list.fslist');
    /*     * ******************** INSERT FACULTY | OKR ******************** */
    Route::get('/list/copyBase', 'ZvitController@copyBaseOKR')->name('list.copy.okr');
    Route::post('/list/insfk', 'ZvitController@storekf')->name('list.fk.store');
    Route::post('/list/insok', 'ZvitController@storeokr')->name('list.okr.store');
    /*     * ******************** EDIT FACULTY|KAFEDRA ******************** */
    Route::get('/list/{idfaculty}/edit', 'ZvitController@facultyedit')->name('list.fk.edit');
    Route::put('/list/{idfaculty}', 'ZvitController@update_faculty')->name('list.fk.update');
    Route::delete('/list/{facultyid}', 'ZvitController@destroyfaculty')->name('list.fk.destroy');
    /*     * ******************** EDIT OKR ******************************** */
    Route::get('/listokr/{okr}/edit', 'ZvitController@okr_edit')->name('list.okr.edit');
    Route::put('/listokr/{okr}', 'ZvitController@okr_update')->name('list.okr.update');
    Route::delete('/listokr/{okr}', 'ZvitController@okr_destroy')->name('list.okr.destroy');

    /* TABLE 1 */
    Route::get('/table1', 'TableController@table1')->name('table1');
    Route::get('/table1/{tablica1}/edit', 'TableController@edit_tablica1')->name('table1.edit');
    Route::put('/table1/{tablica1}', 'TableController@update_tablica1')->name('table1.update');
    Route::post('/table1/insert', 'TableController@insert_tablica1')->name('table1.insert');
    Route::delete('/table1/{tablica1}', 'TableController@delete_tablica1')->name('table1.destroy');

    /* TABLE 2 */
    Route::get('/table2', 'TableController@table2')->name('table2');
    Route::get('/table2/{tablica2}/edit', 'TableController@edit_tablica2')->name('table2.edit');
    Route::put('/table2/{tablica2}', 'TableController@update_tablica2')->name('table2.update');
    Route::post('/table2/insert', 'TableController@insert_tablica2')->name('table2.insert');
    Route::delete('/table2/{tablica2}', 'TableController@delete_tablica2')->name('table2.destroy');

    /* TABLE 3 */
    Route::get('/table3', 'TableController@table3')->name('table3');
    Route::get('/table3/{tablica3}/edit', 'TableController@edit_tablica3')->name('table3.edit');
    Route::put('/table3/{tablica3}', 'TableController@update_tablica3')->name('table3.update');
    Route::post('/table3/insert', 'TableController@insert_tablica3')->name('table3.insert');
    Route::delete('/table3/{tablica3}', 'TableController@delete_tablica3')->name('table3.destroy');

    /* TABLE 4 */
    Route::get('/table4', 'TableController@table4')->name('table4');
    Route::get('/table4/{tablica4}/edit', 'TableController@edit_tablica4')->name('table4.edit');
    Route::put('/table4/{tablica4}', 'TableController@update_tablica4')->name('table4.update');
    Route::post('/table4/insert', 'TableController@insert_tablica4')->name('table4.insert');
    Route::delete('/table4/{tablica4}', 'TableController@delete_tablica4')->name('table4.destroy');

    /* TABLE 5 */
    Route::get('/table5', 'TableController@table5')->name('table5');
    Route::get('/table5/{tablica5}/{selectrow}/edit', 'TableController@edit_tablica5')->name('table5.edit');
    Route::put('/table5/{tablica5}', 'TableController@update_tablica5')->name('table5.update');
    Route::post('/table5/insert', 'TableController@insert_tablica5')->name('table5.insert');
    Route::delete('/table5/{tablica5}', 'TableController@delete_tablica5')->name('table5.destroy');

    // Export Tables
    Route::post('/export/table1', 'ExportController@Tablica1')->name('table1.export');
    Route::post('/export/table2', 'ExportController@Tablica2')->name('table2.export');
    Route::post('/export/table3', 'ExportController@Tablica3')->name('table3.export');
    Route::post('/export/table4', 'ExportController@Tablica4')->name('table4.export');
    Route::post('/export/table5', 'ExportController@Tablica5')->name('table5.export');
});