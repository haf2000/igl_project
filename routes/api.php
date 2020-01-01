<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//******************************************************************************************************************
// Liste etudiant
//******************************************************************************************************************
Route::get('etudiants','EtudiantsController@index');
// afficher etudiant
Route::get('etudiant/{id}','EtudiantsController@show');
//creer etudiant
Route::post('etudiant/{id}','EtudiantsController@store');
//Update etudiant
Route::put('etudiant/{id}','EtudiantsController@update');
//Supprimer etudiant
Route::delete('etudiant/{id}','EtudiantsController@destroy');
//******************************************************************************************************************
// Liste enseignant
//******************************************************************************************************************
Route::get('profs','EnseignantsController@index');
// Afficher enseignant
Route::get('prof/{id}','EnseignantsController@show');
//creer enseignant
Route::post('prof/{id}','EnseignantsController@store');
//Update enseignant
Route::put('prof/{id}','EnseignantsController@update');
//Supprimer enseignant
Route::delete('prof/{id}','EnseignantsController@destroy');
//******************************************************************************************************************
// Liste Livres
//******************************************************************************************************************
Route::get('livres','LivresController@index');


