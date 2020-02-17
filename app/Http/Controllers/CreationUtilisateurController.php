<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreationUtilisateurRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Utilisateur;


class CreationUtilisateurController extends Controller
{
    //
    public function creer_utilisateur()
    {
        return view('regisseur.creer_utilisateur');
    }

    public function enregistrer_utilisateur(CreationUtilisateurRequest $request)
    {
        $data = $request->all();
        $prenom = $data['prenom'];
        $nom = $data['nom'];
        $date_naissance = $data['date_naissance'];
        $num_tel = $data['numero_telephone'];
        $profil = $data['profil'];
        $email = $data['email'];
        $password = Hash::make($data['password']);

        $utilisateur = new Utilisateur([
            'prenom' => $prenom,
            'nom' => $nom,
            'date_naissance' => $date_naissance,
            'numero_telephone' => $num_tel,
            'profil' => $profil,
        ]);

        $utilisateur->save();

        $user = new User([
            'id' => $utilisateur->id,
            'email' => $email,
            'password' => $password
        ]);
        $user->save();
        echo "Userrr created successfully";
    }



}