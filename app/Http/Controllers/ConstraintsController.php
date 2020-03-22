<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pavillon;

use App\Etage;

use App\Chambre;

class ConstraintsController extends Controller{
    //

    public function index(){

        $pavillons = Pavillon::all();

        return view('regisseur/add_constraint')->with('pavillons',$pavillons);

    }


    public function add_constraint(Request $request){

        if($request->input('chambre') != null){

            $this->add_constraint_on_room($request->input('chambre'), $request->input('sex') , $request->input('level') );


        }elseif ($request->input("etage") != null) {
            
            $rooms = Chambre::all()->where('idEtage','=',$request->input("etage"));

            foreach ($rooms as $room) {

                $this->add_constraint_on_room($room->id, $request->input('sex') , $request->input('level') );
            }

        }elseif($request->input("pavillon") != null){
            
            $floors = Etage::all()->where('idPavillon','=', $request->input("pavillon"));
        
            foreach ($floors as $floor) {         
                
                $rooms = Chambre::all()->where('idEtage','=',$floor->id);
              
                foreach ($rooms as $room) {

                    $this->add_constraint_on_room($room->id, $request->input('sex') , $request->input('level') );
                }
            }
        }

       return redirect()->back();
    }


    public function fetch(Request $request){

        $type = $request->get('type');

        $id = $request->get('element_id');

        if($type == 'pavillon'){

            $etages = Etage::all()->where('idPavillon','=',$id);

            $result = "<option value=''>Choisissez un étage</option>";

            foreach ($etages as $etage) {

                $result .= "<option value=$etage->id>$etage->libelle</option>\n";

            }

        }elseif ($type == 'etage') {

            $chambres = Chambre::all()->where('idEtage','=',$id);

            $result = "<option value=''>Choisissez une chambre</option>";

            foreach ($chambres as $chambre) {
                
                $result .= "<option value=$chambre->id>Chambre $chambre->numero</option>\n";

            }

        }

        return $result;

    }


    public function add_constraint_on_room($room_id , $sex_constraint = null , $level_constraint = null){

            $chambre = Chambre::where('id','=',$room_id)->first();

            if($sex_constraint!= null)

                $chambre->contrainteSexe = $sex_constraint;

            if($level_constraint != null)

                $chambre->contrainteNiveauEtude = $level_constraint;

            $chambre->save();

    }
    
}
