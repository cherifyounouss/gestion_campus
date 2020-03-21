<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = [
        'numero', 'disponible', 'contrainteSexe', 'contrainteNiveauEtude', 'idEtage',
    ];
    public $timestamps = false;
}