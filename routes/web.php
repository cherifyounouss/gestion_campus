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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/etudiant/upload', 'EtudiantController@index');
Route::post('/etudiant/import', 'EtudiantController@import');
Route::get('/creer_utilisateur', 'CreationUtilisateurController@creer_utilisateur')->name('profil_utilisateur.creer');
Route::post('/enregistrer_utilisateur', 'CreationUtilisateurController@enregistrer_utilisateur')->name('profil_utilisateur.enregistrer');
Route::get('/pavillon/enregistrer', 'PavillonController@create')->name('pavillon.enregistrer');
Route::post('/pavillon/sauver', 'PavillonController@store')->name('pavillon.sauver');
Route::get('/pavillon/liste', 'PavillonController@index')->name('pavillon.liste');