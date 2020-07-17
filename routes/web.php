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
Route::get('/proyek/search/','ProyekController@liveSearch')->name('liveSearch');
Route::get('/proyek/filter/','ProyekController@liveFilter')->name('liveFilter');
Route::get('pagination/fetch_data', 'ProyekController@fetch_data');

Route::get('/proyek/tambah', 'ProyekController@create');
Route::post('/proyek/actual/{id}', 'ProyekController@detail');
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

Route::get('/drawing/{id}/file','DrawingController@create');
Route::post('/drawing','DrawingController@store');
Route::delete('/drawing/{drawing}','DrawingController@destroy');

Route::get('/calendar', 'CalendarController@index');
Route::post('/contractor', 'ContractorController@store');

Route::get('/progres/proyek/{id}','ProgressController@index');
Route::get('/progres/histori/{id}','ProgressController@histori');
Route::get('/progres/batal/{id}','ProgressController@batal');
Route::post('/progres','ProgressController@store');
Route::post('/progres/perkembangan','ProgressController@store2');
Route::delete('/progres/perkembangan/{id}','ProgressController@destroy2');
Route::get('/progres/item/{id}','ProgressController@detailItem');
Route::delete('/progres/riwayat/{id}','ProgressController@destroy');
Route::get('/progres/riwayat/{id}','ProgressController@detailRiwayat');



Route::get('/histori', 'HistoriController@index');
Route::get('/histori/search/','HistoriController@liveSearch')->name('liveSearch');
Route::get('/histori/filter/','HistoriController@liveFilter')->name('liveFilter');
Route::get('/histori/fetch_data', 'HistoriController@fetch_data');
Route::get('/histori/{proyek}', 'HistoriController@show');
Route::get('/histori/{proyek}/rating', 'HistoriController@rating');
Route::post('/histori/rating','HistoriController@store');

Route::get('/batal', 'BatalController@index');
Route::get('/batal/search/','BatalController@liveSearch')->name('liveSearch');
Route::get('/batal/filter/','BatalController@liveFilter')->name('liveFilter');
Route::get('/batal/fetch_data', 'BatalController@fetch_data');
Route::get('/batal/{proyek}', 'BatalController@show');

Route::get('/rating', 'RatingController@index');



