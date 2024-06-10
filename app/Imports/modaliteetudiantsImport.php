<?php

namespace App\Imports;
use App\Models\modaliteetudiants;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class modaliteetudiantsImport implements ToModel{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new modaliteetudiants([
           'echeance'     => $row[0],
           'montant'    => $row[1],
           'sms_envoye' => $row[3],
           'date_sms' => $row[4],
           'etat' => $row[5],
           'etudiant_id' => $row[6],
        ]);
    }
}
