<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = ['prenom', 'nom', 'date_naissance', 'numero_telephone', 'profil'];
    public $timestamps = false;
}