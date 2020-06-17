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
Route::get('/proyek/tambah', 'ProyekController@create');
Route::post('/proyek', 'ProyekController@store');

Route::get('/boq', 'BillController@index');
Route::get('/purchase', 'PurchaseRequisitionController@index');
Route::get('/spk', 'SpkController@index');