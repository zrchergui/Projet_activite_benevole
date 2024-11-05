<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Repositories\Data;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
  
    return view('welcome');
});
*/
/*Route::get('/', [Data::class, 'codePostaux'])->name('Data.show');*/
/*Route::get('/', [Controller::class, 'showRanking'])->name('teams.show');*/
Route::get('/accueil', [Controller::class, 'showAccueil'])->name('Accueil.show');
Route::get('/activiteAlimentaire', [Controller::class, 'showactAlimentaire'])->name('activiteAlimentaire.show');
Route::get('/activiteScolaire', [Controller::class, 'showactScolaire'])->name('activiteScolaire.show');
Route::get('/activiteSenior', [Controller::class, 'showactSenior'])->name('activiteSenior.show');

Route::get('/inscription', [Controller::class, 'showInscription'])->name('inscription.show');
Route::post('/inscription', [Controller::class, 'storeInscription'])->name('inscription.store');


Route::get('/loginPage', [Controller::class, 'showloginPage'])->name('loginPage.show');
Route::post('/loginPage', [Controller::class, 'login'])->name('loginPage.log');

Route::post('/logout', [Controller::class, 'logout'])->name('logout');

Route::get('/EspaceBnv', [Controller::class, 'showEspaceBnv'])->name('EspaceBnv.show');/*->middleware('auth');/**/
Route::post('/EspaceBnv', [Controller::class, 'showEspaceBnv'])->name('EspaceBnv.post');

Route::get('/EspaceBnvDispo', [Controller::class, 'showEspaceBnvDispo'])->name('EspaceBnv-Dispo.show');

Route::get('/EspaceBnvActivite', [Controller::class, 'showEspaceBnvActivite'])->name('EspaceBnv-Activite.show');
Route::post('/EspaceBnvActivite', [Controller::class, 'responseParticipation'])->name('responseParticipation.post');

Route::post('/EspaceBnvDispo', [Controller::class, 'storeEspaceBnvDispo'])->name('EspaceBnv-Dispo.store');




Route::get('/AdmineVue1', [Controller::class, 'showEspaceAdmineFirst'])->name('aAdmineVue1.show');/*->middleware('auth');*/
Route::post('/AdmineVue1', [Controller::class, 'showEspaceAdmineFirst'])->name('aAdmineVue1.post');

Route::get('/AdmineVue2b', [Controller::class, 'showEspaceAdmineBenevole'])->name('aAdmineVue2b.show');

Route::get('/AdmineVue3act', [Controller::class, 'showEspaceAdmineActivite'])->name('aAdmineVue3act.show');

Route::get('/AdmineVue3actAjouter', [Controller::class, 'showEspaceAdmineAjouterActivite'])->name('aAdmineVue3actAjouter.show');
Route::post('/AdmineVue3actAjouter', [Controller::class, 'StoreActivite'])->name('aAdmineVue3actAjouter.post');

Route::get('/aAdmineVue4actParticipant/{IdAct}', [Controller::class, 'showParticipant'])->where('IdAct', '[0-9]+')->name('aAdmineVue4actParticipant.show');/**aAdmineVue4actParticipant.blade*/

Route::get('/aAdmineVue5actAjParticipant/{IdAct}', [Controller::class, 'showAjParticipant'])->where('IdAct', '[0-9]+')->name('aAdmineVue5actAjParticipant.show');
Route::post('/aAdmineVue5actAjParticipant', [Controller::class, 'ajouterParticipant'])->name('aAdmineVue5actAjParticipant.post');

Route::post('/aAdmineVue5actAjParticipant/supprimer', [Controller::class, 'supprimerParticipant'])->name('aAdmineVue5actSupParticipant.post');






























