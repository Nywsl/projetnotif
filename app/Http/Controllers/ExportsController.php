<?php
namespace App\Http\Controllers;
use App\Exports\ClasseExport;
use App\Exports\NiveauExport;
use App\Exports\EtudiantExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportsController extends Controller
{
    public function exportClasse()
    {
        return Excel::download(new ClasseExport, 'classes.xlsx');
    }

    public function exportNiveau()
    {
        return Excel::download(new NiveauExport, 'niveaux.xlsx');
    }

    public function exportEtudiant()
    {
        return Excel::download(new EtudiantExport, 'etudiants.xlsx');
    }
}
