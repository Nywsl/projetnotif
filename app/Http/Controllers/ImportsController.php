<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Niveau;
use App\Models\etudiants;

class ImportsController extends Controller
{
    public function importclasse()
    {
         // Affiche la vue de la liste des classes
    return view('presets.AnneeAcademique.listesclasses')->with('success', 'Les classes ont été importées avec succès.');
    }


    public function importniveau()
    {
         // Affiche la vue de la liste des classes
    return view('presets.AnneeAcademique.listesclasses')->with('success', 'Les classes ont été importées avec succès.');
    }


    public function importretard()
    {
     return view('presets.modaliteetudiant.listemodaliteetudiant')->with('success', 'Les classes ont été importées avec succès.');
    }


    public function importetudiant()
    {
        // Affiche la vue de la liste des classes
    return view('presets.AnneeAcademique.listeetudiants')->with('success', 'Les etudiants ont été importées avec succès.');

    }

    public function processClasseImport(Request $request)
    {
        // Importez le fichier Excel pour les classes ici
        return redirect()->route('import-classe')->with('success', 'Les classes ont été importées avec succès.');
    }

    public function processNiveauImport(Request $request)
    {
        // Importez le fichier Excel pour les niveaux ici
        return redirect()->route('import-niveau')->with('success', 'Les niveaux ont été importés avec succès.');
    }

    public function processEtudiantImport(Request $request)
    {
        // Importez le fichier Excel pour les étudiants ici
        return redirect()->route('import-etudiant')->with('success', 'Les étudiants ont été importés avec succès.');
    }


}
