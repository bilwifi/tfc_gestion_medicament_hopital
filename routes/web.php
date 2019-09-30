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
Route::get('/medecin', 'Auth\MedecinLoginController@showLoginForm')->name('medecin-login');
Route::post('/medecin', ['as'=> 'medecin-login','uses'=>'Auth\MedecinLoginController@login']);
Route::prefix('medecin')->group(function(){
	Route::name('medecin.')->group(function () {
		Route::get('/home', 'MedecinController@index' )->name('index');

		Route::post('/create_ordonnance', 'MedecinController@createOrdonnance' )->name('create_ordonnance');
		Route::post('/add_prescription', 'MedecinController@addPrescription' )->name('add_prescription');
		Route::get('/send_ordonnance/{ordonnance}', 'MedecinController@sendOrdonnance' )->name('send_ordonnance');
		Route::get('/list_ordonnance', 'MedecinController@listOrdonnance' )->name('list_ordonnance');
		Route::get('/list_ordonnance_archivee', 'MedecinController@listOrdonnanceArchivee' )->name('list_ordonnance_archivee');


		






		// Déconnexion prof
		Route::post('/medecin-logout',function(){
			auth()->logout();
			return redirect()->route('medecin-login');
		})->name('logout');
	});
});

Route::get('/home', 'PharmacieController@index')->name('home');
Route::get('/archiver_ordonnance/{ordonnance}', 'PharmacieController@archiverOrdonnance' )->name('archiver_ordonnance');
		Route::get('/list_ordonnance', 'PharmacieController@listOrdonnance' )->name('list_ordonnance');
		Route::get('/list_ordonnance_archivee', 'PharmacieController@listOrdonnanceArchivee' )->name('list_ordonnance_archivee');

		Route::get('/show_medicament', 'PharmacieController@showMedicament' )->name('show_medicament');








Route::get('/view_ordonnance/{ordonnance}', 'MedecinController@viewOrdonnance' )->name('view_ordonnance');
