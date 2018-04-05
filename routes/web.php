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

Route::get('/', 'Mine@index');
Route::get('/nouvelle', 'Mine@nouvelle')->middleware('auth');
Route::get('/nouvelle2', 'Mine@nouvelle2')->middleware('auth');
Route::post('/creer', 'Mine@creer')->middleware('auth');
Route::post('/creeralbum', 'Mine@creeralbum')->middleware('auth');
Route::get('/utilisateur/{id}','Mine@utilisateur')->where('id','[0-9]+');
Route::post('/utilisateur', 'Mine@update_avatar');
Route::get('/album/{id}','Mine@album')->where('id','[0-9]+');
Route::get('/photo/{id}','Mine@photo')->where('id','[0-9]+');
Route::get('/suivi/{id}','Mine@suivi')->middleware('auth')->where('id','[0-9]+');
Route::get('/recherche/{s}','Mine@recherche');
Route::get('/deletephoto/{id}','Mine@delete_pic')->middleware('auth')->where('id','[0-9]+');
Route::get('/deletealbum/{id}','Mine@delete_album')->middleware('auth')->where('id','[0-9]+');

Auth::routes();