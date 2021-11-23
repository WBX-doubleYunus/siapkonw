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
// auth
Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@doLogin')->middleware('guest');
Route::get('/logout', 'AuthController@doLogout')->middleware('auth');
Route::get('/profil/{id}', 'AuthController@profile')->name('profile')->middleware('auth');
Route::post('/profil/{id}/store', 'AuthController@profil_store')->name('profil.store')->middleware('auth');
Route::post('/profil/{id}/password_store', 'AuthController@password_store')->name('password.store')->middleware('auth');

// agenda
Route::get('/', 'AgendaController@index')->name('agenda.index')->middleware('auth');
Route::get('/agenda/create', 'AgendaController@create')->name('agenda.create')->middleware('auth');
Route::post('/agenda/store', 'AgendaController@store')->name('agenda.store')->middleware('auth');
Route::get('/agenda/edit/{id}', 'AgendaController@edit')->name('agenda.edit')->middleware('auth');
Route::post('/agenda/update/{id}', 'AgendaController@update')->name('agenda.update')->middleware('auth');
Route::get('/riwayat/detail/{id}', 'AgendaController@detail')->name('agenda.detail')->middleware('auth');
Route::get('/agenda/delete/{id}', 'AgendaController@delete')->name('agenda.delete')->middleware('auth');
Route::get('/agenda/confirm/{id}', 'AgendaController@confirm')->name('agenda.confirm')->middleware('auth');
Route::post('/agenda/confirm/{id}/update', 'AgendaController@confirm_update')->name('agenda.confirm-update')->middleware('auth');

// riwayat
Route::get('/riwayat', 'AgendaController@indexRiwayat')->name('riwayat.index');

// pekerja
Route::get('/pekerja', 'PekerjaController@index')->name('pekerja.index');
Route::get('/pekerja/create', 'PekerjaController@create')->name('pekerja.create');
Route::post('/pekerja/store', 'PekerjaController@store')->name('pekerja.store')->middleware('auth');
Route::get('/pekerja/edit/{id}', 'PekerjaController@edit')->name('pekerja.edit')->middleware('auth');
Route::post('/pekerja/update/{id}', 'PekerjaController@update')->name('pekerja.update')->middleware('auth');
Route::get('/pekerja/delete/{id}', 'PekerjaController@delete')->name('pekerja.delete')->middleware('auth');

//persediaan
Route::get('persediaan', 'PersediaanController@index')->name('persediaan.index');
Route::get('/persediaan/create', 'PersediaanController@create')->name('persediaan.create');
Route::post('/persediaan/store', 'PersediaanController@store')->name('persediaan.store')->middleware('auth');
Route::get('/persediaan/edit/{id}', 'PersediaanController@edit')->name('persediaan.edit')->middleware('auth');
Route::post('/persediaan/update/{id}', 'PersediaanController@update')->name('persediaan.update')->middleware('auth');
Route::get('/persediaan/delete/{id}', 'PersediaanController@delete')->name('persediaan.delete')->middleware('auth');