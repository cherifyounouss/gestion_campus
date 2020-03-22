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



Route::get('/liste_pavillons', function () {
	$pavillons=DB::SELECT('select * from pavillons');
	//dump($data);
    return view('regisseur/liste_pavillons')->with('pavillons',$pavillons);
});

Route::post('/choix_etage', function () {
	$idPav=$_POST['id'];
	$etages=DB::SELECT("select * from etages where idPavillon=$idPav");
    return view('regisseur/choix_etage')->with('etages',$etages)->with('idPav',$idPav);
});

Route::post('/modifier_chambre', function () {
	$idPav=$_POST['idPav'];
	$idEtage=$_POST['idEtage'];
	
    return view('regisseur/modifier_chambre')->with('idEtage',$idEtage)->with('idPav',$idPav);
});

Route::post('/modifier_pavillon', function () {
	$idPav=$_POST['idPav'];
	$idEtage=$_POST['idEtage'];
	$numero=$_POST['numero'];
	$data=[
		'0'=>$idPav,
		'1'=>$idEtage,
		'2'=>$numero
	];
    return view('regisseur/modifier_pavillon')->with('data',$data);
});

Route::post('/pavillon_modifie', function () {
	// mettre a jours le pavillon
	$idChambre=$_POST['idChambre'];
	$numero=$_POST['numero'];
	$etat=$_POST['etat'];
	$sexe=$_POST['sexe'];
	$contarinteNV=$_POST['contarinteNV'];
	DB::table('chambres')
            ->where('id', $idChambre)
            ->update([
            	'numero' => $numero,
            	'disponible' => $etat,
            	'contrainteSexe' => $sexe,
            	'contrainteNiveauEtude' => $contarinteNV

            ]);

    // mettre a jours le nom du pavillon
	$idPav=$_POST['idPav'];
	$libelle=$_POST['pavillon'];
	DB::table('pavillons')
            ->where('id', $idPav)
            ->update(['libelle' => $libelle]);

    // mettre a jours l'etage
    $idEtage=$_POST['idEtage'];
    $libelle=$_POST['etage'];
	DB::table('etages')
            ->where('id', $idEtage)
            ->update(['libelle' => $libelle]);

    return "modification Reussie";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/etudiant/upload', 'EtudiantController@index');
Route::post('/etudiant/import', 'EtudiantController@import');
Route::get('/creer_utilisateur', 'CreationUtilisateurController@creer_utilisateur')->name('profil_utilisateur.creer');
Route::post('/enregistrer_utilisateur', 'CreationUtilisateurController@enregistrer_utilisateur')->name('profil_utilisateur.enregistrer');

//Route::post('/modifier_pavillon', 'PavillonController@update')->name('.');