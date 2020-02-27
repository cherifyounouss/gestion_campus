<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    protected $fillable = [
        'prenom', 'nom', 'cni', 'ine', 'niveau',
    ];
    public $timestamps = false;
}
