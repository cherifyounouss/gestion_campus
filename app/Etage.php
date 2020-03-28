<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etage extends Model
{
    protected $fillable = [
        'libelle', 'idPavillon',
    ];
    public $timestamps = false;
}
