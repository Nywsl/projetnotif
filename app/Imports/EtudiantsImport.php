<?php

namespace App\Imports;

use App\Models\Etudiants;
use Maatwebsite\Excel\Concerns\ToModel;

class EtudiantsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Etudiants([
            'nom' => $row[0],
            'prenom' => $row[1],
            'date_naissance' => $row[2], // Champ 'date_naissance' correspond à l'index 2 dans le tableau $row
            'contact' => $row[3], // Champ 'contact' correspond à l'index 3 dans le tableau $row
            'matricule' => $row[4], // Champ 'matricule' correspond à l'index 4 dans le tableau $row
            'classe_id' => $row[5], // Champ 'classe_id' correspond à l'index 5 dans le tableau $row

        ]);
    }
}
