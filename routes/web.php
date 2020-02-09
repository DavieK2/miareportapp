<?php

use App\Http\Controllers\LanguageController;

/*
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});

Route::group([
    'prefix' => 'class_registers',
], function () {
    Route::get('/', 'ClassRegistersController@index')
         ->name('class_registers.class_register.index');
    Route::get('/create','ClassRegistersController@create')
         ->name('class_registers.class_register.create');
    Route::get('/show/{classRegister}','ClassRegistersController@show')
         ->name('class_registers.class_register.show')->where('id', '[0-9]+');
    Route::get('/{classRegister}/edit','ClassRegistersController@edit')
         ->name('class_registers.class_register.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClassRegistersController@store')
         ->name('class_registers.class_register.store');
    Route::put('class_register/{classRegister}', 'ClassRegistersController@update')
         ->name('class_registers.class_register.update')->where('id', '[0-9]+');
    Route::delete('/class_register/{classRegister}','ClassRegistersController@destroy')
         ->name('class_registers.class_register.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'reports',
], function () {
    Route::get('/', 'ReportsController@index')
         ->name('reports.report.index');
    Route::get('/create','ReportsController@create')
         ->name('reports.report.create');
    Route::get('/show/{report}','ReportsController@show')
         ->name('reports.report.show')->where('id', '[0-9]+');
    Route::get('/{report}/edit','ReportsController@edit')
         ->name('reports.report.edit')->where('id', '[0-9]+');
    Route::post('/', 'ReportsController@store')
         ->name('reports.report.store');
    Route::put('report/{report}', 'ReportsController@update')
         ->name('reports.report.update')->where('id', '[0-9]+');
    Route::delete('/report/{report}','ReportsController@destroy')
         ->name('reports.report.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'schools',
], function () {
    Route::get('/', 'SchoolsController@index')
         ->name('schools.school.index');
    Route::get('/create','SchoolsController@create')
         ->name('schools.school.create');
    Route::get('/show/{school}','SchoolsController@show')
         ->name('schools.school.show')->where('id', '[0-9]+');
    Route::get('/{school}/edit','SchoolsController@edit')
         ->name('schools.school.edit')->where('id', '[0-9]+');
    Route::post('/', 'SchoolsController@store')
         ->name('schools.school.store');
    Route::put('school/{school}', 'SchoolsController@update')
         ->name('schools.school.update')->where('id', '[0-9]+');
    Route::delete('/school/{school}','SchoolsController@destroy')
         ->name('schools.school.destroy')->where('id', '[0-9]+');
});

Route::resource('uploads', 'UploadController');
Route::get('uploads/{uuid}/download', 'UploadController@download')->name('uploads.download');
Route::delete('uploads/{uuid}','UploadController@destroy')
         ->name('upload.destroy')->where('uuid', '[0-9]+');