<?php

namespace App\Exports;
use App\Models\ModaliteEtudiants;
use Maatwebsite\Excel\Concerns\FromCollection;


class ModaliteetudiantretardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModaliteEtudiants::all();
    }
}
