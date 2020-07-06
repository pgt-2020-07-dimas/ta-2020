<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('/', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/proyek', 'ProyekController@index');
route::get('/proyek/search/','ProyekController@liveSearch')->name('liveSearch');
Route::get('/proyek/tambah', 'ProyekController@create');
Route::get('/proyek/{proyek}', 'ProyekController@show');
Route::get('/proyek/{proyek}/edit', 'ProyekController@edit');
Route::post('/proyek', 'ProyekController@store');
Route::delete('/proyek/{proyek}', 'ProyekController@destroy');
Route::patch('/proyek/{proyek}', 'ProyekController@update');
Route::patch('/proyek', 'ProyekController@tunda');


Route::post('/boq/tambah', 'BillController@create');
Route::patch('/boq/{bill}', 'BillController@update');
Route::delete('/boq/{bill}', 'BillController@destroy');
Route::post('/boq', 'BillController@store');
Route::get('/boq/{bill}/edit', 'BillController@edit');

Route::get('/pr/{purchase_requisition}/edit', 'PurchaseRequisitionController@edit');
Route::patch('/pr/{purchase_requisition}', 'PurchaseRequisitionController@update');
Route::post('/pr/tambah', 'PurchaseRequisitionController@create');
Route::delete('/pr/{purchase_requisition}', 'PurchaseRequisitionController@destroy');
Route::post('/pr', 'PurchaseRequisitionController@store');

Route::get('/spk/{spk}/edit', 'SpkController@edit');
Route::patch('/spk/{spk}', 'SpkController@update');
Route::post('/spk/tambah', 'SpkController@create');
Route::delete('/spk/{spk}', 'SpkController@destroy');
Route::post('/spk', 'SpkController@store');

Route::resource('drawing.file', 'DrawingController');
Route::get('/calendar', 'CalendarController@index');

Route::post('/contractor', 'ContractorController@store');

