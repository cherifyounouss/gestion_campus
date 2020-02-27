<?php

namespace App\Imports;

use App\Etudiant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtudiantsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dump($row); // print the current row for debugging.
        return new Etudiant([
            'prenom' => $row['prenom'],
            'nom' => $row['nom'],
            'cni' => $row['cni'],
            'ine' => $row['ine'],
            'niveau' => $row['niveau'],
        ]);
    }
}
