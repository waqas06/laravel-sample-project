<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'DatatableController@save');
Route::get('/show', 'DatatableController@index');
Route::get('/showone/{id}', 'DatatableController@singleshow');
Route::get('/edit/{id}', 'DatatableController@edit');
Route::post('posts', 'DatatableController@saveedit');
