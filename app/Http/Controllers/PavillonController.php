<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pavillon;
use App\Etage;
use App\Chambre;
class PavillonController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pavillonsFromDB = Pavillon::all();
        $pavillons = array();
        foreach ($pavillonsFromDB as $pav) {
            $pavillons[$pav->libelle] = array();
            // recuperation des etages du pavillon
            $etages = Etage::where('idPavillon', $pav->id)->get();
            foreach ($etages as $etage) {
                //$pavillons[$pav->libelle][$etage->libelle] = array();
                $nombreChambre = Chambre::where('idEtage', $etage->id)->count();
                $pavillons[$pav->libelle][$etage->libelle] = $nombreChambre;
            }
        }
        //echo($pavillons->count().'\n');
        return view('regisseur.liste_pavillon')->with('pavillons', $pavillons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regisseur.enregistrer_pavillon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $libellePavillon = $data['libelle'];
        $nombreEtage = intval($data['nombreEtage']);

        $pavillon = new Pavillon(['libelle' => $libellePavillon]);
        $pavillon->save();
        //echo($nombreEtage);
        if ($nombreEtage > 0) {
            for ($i=0; $i < $nombreEtage; $i++) {
                $etage = explode('|', $data['etage'.$i]);
                $libelleEtage = $etage[0];
                $nombreChambre = intval($etage[1]);
                $etage = new Etage([
                    'libelle' => $libelleEtage,
                    'idPavillon' => $pavillon->id
                ]);
                $etage->save();
                for ($j=1; $j <= $nombreChambre; $j++) { 
                    $chambre = new Chambre([
                        'numero' => $j,
                        'idEtage' => $etage->id
                    ]);
                    $chambre->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Le pavillon a été enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
