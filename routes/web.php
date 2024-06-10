<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\PaiementsController;
use App\Http\Controllers\AnneeAcademiquecontroller;
use App\Http\Controllers\ContactsController;
use App\http\Controllers\ModaliteEtudiantsController;
use App\Http\Controllers\ModaliteNiveauController;
use App\Http\Controllers\ModalitePaiementController;
use App\Http\Controllers\Envoi_sms;
use App\Http\Controllers\ImportsController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\InscriptionsController;
use App\Http\Controllers\PreinscriptionsController;
use App\Http\Controllers\ContactsControllers;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ParametreController;
use App\http\Controllers\ParentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OthersController;
use App\http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth'], function () {

    // route etudiants
    Route::get('listedesetudiants', [EtudiantsController::class, 'listedesetudiants'])->name('listedesetudiants');
    Route::post('ajoutdesetudiants', [EtudiantsController::class, 'ajoutdesetudiants'])->name('ajoutdesetudiants');
    Route::get('pageajoutetudiants', [EtudiantsController::class, 'pageajoutetudiants'])->name('pageajoutetudiants');
    Route::get('etudiants/{etudiant}/edit', [EtudiantsController::class, 'edit'])->name('etudiants.edit');
    Route::put('etudiants/{etudiant}', [EtudiantsController::class, 'update'])->name('etudiants.update');
    Route::delete('etudiants/{etudiant}', [EtudiantsController::class, 'destroy'])->name('etudiants.destroy');
    Route::post('/importeretudiants', [EtudiantsController::class, 'importeretudiants'])->name('importeretudiants');
    Route::get('/Exporteretudiants', [EtudiantsController::class, 'Exporteretudiants'])->name('Exporteretudiants');

    // Routes pour les classes
Route::get('listesclasses', [ClasseController::class, 'listesclasses'])->name('listesclasses');
Route::get('pageclasse', [ClasseController::class, 'pageclasse'])->name('pageclasse');
Route::post('Ajoutclasse', [ClasseController::class, 'Ajoutclasse'])->name('Ajoutclasse');
Route::get('/classes/{id}', [ClasseController::class, 'show'])->name('classes.show');
Route::get('/classes/{id}/edit', [ClasseController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{id}', [ClasseController::class, 'update'])->name('classes.update');
Route::delete('/classes/{id}', [ClasseController::class, 'destroy'])->name('classes.destroy');
Route::get('classes/{id}/etudiants', [ClasseController::class, 'listesetudiants'])->name('classelisteetudiants');
Route::post('classes/{id}/etudiant', [ClasseController::class, 'ajoutetudiant'])->name('classeajoutetudiant');
Route::get('classes/{id}/etudiant', [ClasseController::class, 'pageetudiant'])->name('classepageetudiant');
Route::get('classes/{id}/editetudiant', [ClasseController::class, 'editetudiant'])->name('classeeditetudiant');
Route::delete('classes/{id}/deleteetudiant', [ClasseController::class, 'deleteetudiant'])->name('classedeleteetudiant');
Route::post('classes/{id}/updateetudiant', [ClasseController::class, 'updateetudiant'])->name('classeupdateetudiant');
Route::post('classes/{id}/Importetudiant', [ClasseController::class, 'importetudiant'])->name('classeetudiantimport');
Route::get('classes/{id}/Exportetudiant', [ClasseController::class, 'Exportetudiant'])->name('classeetudiantexport');

// Routes pour les niveaux
Route::get('listeniveaux', [NiveauController::class, 'listeniveaux'])->name('listeniveaux');
Route::post('ajoutniveau', [NiveauController::class, 'ajoutniveau'])->name('ajoutniveau');
Route::get('pageaniveau', [NiveauController::class, 'pageaniveau'])->name('pageaniveau');
Route::get('/niveaux/{id}/edit', [NiveauController::class, 'edit'])->name('niveaux.edit');
Route::put('/niveaux/{id}', [NiveauController::class, 'update'])->name('niveaux.update');
Route::get('/niveaux/{id}/edit', [NiveauController::class, 'editniveau'])->name('listeniveauedit');
Route::put('/niveaux/{id}/updateniveau', [NiveauController::class, 'updateniveau'])->name('listeniveauupdate');
Route::delete('/niveaux/{id}/deleteniveau', [NiveauController::class, 'deleteniveau'])->name('listedeleteniveau');
Route::delete('/niveaux/{id}', [NiveauController::class, 'destroy'])->name('niveaux.destroy');

Route::get('/niveau/{id}/modalites', [NiveauController::class, 'listemodaliteniveau'])->name('niveaulistemodalite');
Route::get('/niveau/{id}/modalite', [NiveauController::class, 'pagemodaliteniveau'])->name('niveaupagemodalite');
Route::post('/niveau/{id}/modalite', [NiveauController::class, 'ajoutmodaliteniveau'])->name('niveauajoutmodalite');


Route::get('/envoyer-sms', [Envoi_sms::class, 'envoisms'])->name('envoyer-sms');
// Route pour enregistrer un numéro de téléphone
Route::post('/enregistrer-numero', [Envoi_sms::class, 'storePhoneNumber'])->name('enregistrer.numero');
// Route pour envoyer des messages personnalisés
Route::post('/envoyer-messages-personnalises', [Envoi_sms::class, 'sendCustomMessage'])->name('envoyer.messages.personnalises');
Route::match(['get','post'],'/envoyer-sms/afficher-form', [Envoi_sms::class, 'afficherFormulaire'])->name('envoyer-sms-form');


// Routes pour les paiements
Route::get('listedespaiements/{id}', [PaiementsController::class, 'listedespaiements'])->name('listedespaiements');
Route::get('pagepaiement', [PaiementsController::class, 'pagepaiement'])->name('pageapaiement');
Route::post('ajoutpaiement', [PaiementsController::class, 'ajoutpaiement'])->name('ajoutpaiement');
route::get('matriculepaiement', [PaiementsController::class, 'matpaiement'])->name('matriculepaiement');
route::get('etudiantpaiement/{id}', [PaiementsController::class, 'etudpaiement'])->name('etudiantpaiement');
route::post('matpagepaiement', [PaiementsController::class, 'matpagepaiement'])->name('matpagepaiement');





// Routes pour l'année scolaire
Route::get('listeAnnee', [AnneeAcademiquecontroller::class, 'listeAnnee'])->name('listeAnnee');
Route::post('ajoutAnnee', [AnneeAcademiquecontroller::class, 'ajoutAnnee'])->name('ajoutAnnee');
Route::get('pageannee', [AnneeAcademiquecontroller::class, 'pageannee'])->name('pageannee');
Route::get('annees/{id}/classes', [AnneeAcademiquecontroller::class, 'listesclasses'])->name('anneelisteclasse');
Route::post('annees/{id}/classes/ajout', [AnneeAcademiquecontroller::class, 'ajoutclasses'])->name('anneeclasseajout');
Route::get('annees/{id}/classes/pageclasses', [AnneeAcademiquecontroller::class, 'pageclasse'])->name('anneepageclasse');
Route::get('annees/{id}/classes/editclasses', [AnneeAcademiquecontroller::class, 'editclasse'])->name('anneeeditclasse');
Route::delete('annees/{id}/classes/deleteclasses', [AnneeAcademiquecontroller::class, 'deleteclasse'])->name('anneedeleteclasse');
Route::get('annees/{id}/editannee', [AnneeAcademiquecontroller::class, 'editannee'])->name('anneeedite');
Route::delete('annees/{id}/deleteannee', [AnneeAcademiquecontroller::class, 'deleteannee'])->name('anneedelete');
//routes pour IMPorts de fichier csv
route::get('import-classe', [ClasseController::class, 'importclasse'])->name('import-classes');
route::get('import-niveau', [NiveauController::class, 'importniveau'])->name('import-niveaux');
route::get('import-etudiant', [ImportsController::class, 'importetudiant'])->name('import-etudiants');
Route::post('import-etudiant', [ImportsController::class, 'processNiveauImport'])->name('import-etudiants');
Route::post('import-retard', [ImportsController::class, 'importretard'])->name('import-retard');
Route::post('import-retard', [ClasseController::class, 'processRetardImport'])->name('import-retard');
Route::post('import-niveau', [NiveauController::class, 'processNiveauImport'])->name('import-niveaux');

//routes pour exporter les fichiers csv

Route::get('export-classe', [ExportsController::class, 'exportClasse'])->name('export-classe');
Route::get('export-niveau', [ExportsController::class, 'exportNiveau'])->name('export-niveau');
Route::get('export-etudiant', [ExportsController::class, 'exportEtudiant'])->name('export-etudiant');
Route::get('export-retard', [ExportsController::class, 'exportretard'])->name('export-retard');



// Routes pour ModaliteNiveau
Route::get('niveaulistemodalite', [ModaliteNiveauController::class, 'listemodaliteniveau'])->name('listemodaliteniveau');
Route::get('pagemodaliteniveau', [ModaliteNiveauController::class, 'pagemodaliteetudiant'])->name('pagemodaliteniveau');
Route::post('ajoutmodaliteniveau', [ModaliteNiveauController::class, 'ajoutmodaliteniveau'])->name('ajoutmodaliteniveau');


// Routes pour ModaliteEtudiant
Route::get('listemodaliteetudiant', [ModaliteEtudiantsController::class, 'listemodaliteetudiant'])->name('listemodaliteetudiant');
Route::get('pagemodaliteetudiant', [ModaliteEtudiantsController::class, 'pagemodaliteetudiant'])->name('pagemodaliteetudiant');
Route::post('ajoutmodaliteetudiant', [ModaliteEtudiantsController::class, 'ajoutmodaliteetudiant'])->name('ajoutmodaliteetudiant');
route::get('modalitesenretard', [ModaliteEtudiantsController::class, 'listedesmodalitesenretard'])->name('modaliteenretard');
route::get('matriculemodalite', [ModaliteEtudiantsController::class, 'matetudiantmodalite'])->name('matriculemodalite');

route::post('matpagemodalite', [ModaliteEtudiantsController::class, 'matepagemodalite'])->name('matpagemodalite');
route::get('modaliteenproche', [ModaliteEtudiantsController::class, 'listedesmodalitesproche'])->name('modaliteenproche');
Route::get('/Exporteretudiants', [ModaliteEtudiantsController::class, 'Exporteretard'])->name('Exporteretudiantsretard');
Route::get('/Importeretudiants', [ModaliteEtudiantsController::class, 'Importeretard'])->name('Importeretudiantsretard');
route::get('modalitesmsretard',[ModaliteEtudiantsController::class,'vueSmsStatut'])->name('envoi_sms_retard');



// Route pour envoyer les félicitations aux nouveaux étudiants
Route::get('/envoyer-felicitations', [Envoi_sms::class, 'envoyerFelicitationsInscription'])->name('envoyer-felicitations');

// Route pour envoyer les rappels d'échéance aux étudiants concernés
Route::get('/envoyer-rappels-echeance', [Envoi_sms::class, 'envoyerRappelsEcheance'])->name('resultat_sms');
// Route pour envoyer les retards aux  étudiants
Route::get('/envoyer-sms-retard', [Envoi_sms::class, 'envoismsretard'])->name('smsretard');

// Route pour voir les sms livrés aux  étudiants
Route::get('/envoyer-sms-statut', [Envoi_sms::class, 'envoismsretard'])->name('resutat_sms');
Route::get('/envoyer-sms-statut', [Envoi_sms::class, 'envoismsproche'])->name('resutat_sms');

// Route pour envoyer les sms proches aux  étudiants
Route::get('/envoyer-sms-proche', [Envoi_sms::class, 'envoismsproche'])->name('smsproche');
//route pour les parametres
Route::get('/parametres', [ParametreController::class, 'index'])->name('parametres.index');
Route::post('/parametres', [ParametreController::class, 'update'])->name('parametres.update');


});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/inscription', [InscriptionsController::class, 'index'])->name('inscription');
Route::get('/preinscription', [PreinscriptionsController::class, 'index'])->name('preinscription');
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');
// route pour panier
route::get('panier/modalite/{id}', [PanierController::class, 'listemodalite'])->name('listemodalitepanier');
route::get('panier/matricule/', [PanierController::class, 'matriculemodalite'])->name('paniermatricule');
route::post('panier/etudiant/', [PanierController::class, 'matepagepanier'])->name('panierpagematricule');
route::post('panier/ajout/', [PanierController::class, 'ajoutpanier'])->name('panierajout');
route::post('panier/suivant',[PanierController::class, 'suivantpanier'])->name('paniersuivant');
route::get('panier/afficher/', [PanierController::class, 'afficherpanier'])->name('panierafficher');
route::get('etudiantmodalite/{id}', [ModaliteEtudiantsController::class, 'etudiantmodalite'])->name('etudiantmodalite');



Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
// Routes pour les administrateurs
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin');
});

// Routes pour les autres utilisateurs
Route::middleware(['auth', 'others'])->group(function () {
    Route::get('/others/home', [OthersController::class, 'index'])->name('others');
});

// Routes pour les utilisateurs normaux
Route::middleware(['auth'])->group(function () {
    Route::get('/user/home', [UserController::class, 'index'])->name('user');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
 // Nouvelle structure pour paramètres
 Route::group(['prefix' => 'parametres', 'as' => 'parametres.'], function () {
    Route::get('general', ['as' => 'general.index', 'uses' => 'App\Http\Controllers\ParametreController@indexGeneral']);
    Route::post('general', ['as' => 'general.update', 'uses' => 'App\Http\Controllers\ParametreController@updateGeneral']);

    Route::get('customization', ['as' => 'customization.index', 'uses' => 'App\Http\Controllers\ParametreController@indexCustomization']);
    Route::post('customization', ['as' => 'customization.update', 'uses' => 'App\Http\Controllers\ParametreController@updateCustomization']);

    Route::get('profile', ['as' => 'profile.index', 'uses' => 'App\Http\Controllers\ParametreController@indexProfile']);
    Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ParametreController@updateProfile']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

Route::prefix('parent')->group(function () {
    Route::get('login', [ParentsController::class, 'showLoginForm'])->name('parent.login');
    Route::post('login', [ParentsController::class, 'login']);
    Route::post('logout', [ParentsController::class, 'logout'])->name('parent.logout');

    Route::get('register', [ParentsController::class, 'showRegisterForm'])->name('parent.register');
    Route::post('register', [ParentsController::class, 'register']);
});





