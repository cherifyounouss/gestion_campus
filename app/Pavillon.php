<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pavillon extends Model
{
    protected $fillable = [
        'libelle',
    ];
    public $timestamps = false;
}
