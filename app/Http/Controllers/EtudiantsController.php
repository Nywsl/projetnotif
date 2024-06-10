<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etudiants;
use App\Models\Classe;
use App\Imports\EtudiantsImport;
use App\Exports\EtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class EtudiantsController extends Controller
{
    /**
     * Affiche la liste des étudiants.
     */
    public function listedesetudiants()
    {
        // Récupérer tous les étudiants depuis la base de données
        $etudiants = etudiants::all();

        // Retourner la vue avec la liste des étudiants
        return view('presets.etudiant.listedesetudiants', compact('etudiants'));
    }

    /**
     * Affiche le formulaire d'ajout d'un étudiant.
     */
    public function pageajoutetudiants()
    {
        // Récupérer toutes les classes pour le champ de sélection
        $classes = Classe::all();

        return view('presets.etudiant.ajoutdesetudiants', compact('classes'));
    }

    /**
     * Enregistre un nouvel étudiant.
     */
    public function ajoutdesetudiants(Request $request,$id)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|date',
            'contact' => 'required|string',
            'matricule' => 'required|string',
           // 'classe_id' => 'required|exists:classes,id',
            //'photo' => 'nullable|image|max:2048', // Ajoutez les règles de validation appropriées pour l'upload d'images
        ]);

        $etudiants= $request->all();
        $etudiants['classe_id']=$id;
        $etudiants['photo']='';
        $etudiants=Etudiants::create($etudiants);



        // Gérer l'envoi du SMS
        $message = "Bonjour " . $etudiants->prenom . ", vous avez été inscrit avec succès.";
        $this->sendSms($etudiants->contact, $message);

        // Rediriger vers la liste des étudiants avec un message de succès
        return redirect()->route('listedesetudiants')->with('success', 'Étudiant ajouté avec succès.');
    }

    /**
 * Importe les étudiants à partir d'un fichier Excel.
 */
public function importeretudiants(Request $request)
{
    // Valider le fichier Excel
    $request->validate([
        'fichier' => 'required|file|mimes:xlsx,xls', // Assure-toi que le fichier est un fichier Excel
    ]);

    // Récupérer le fichier Excel envoyé par le formulaire
    $fichier = $request->file('fichier');

    try {
        // Utiliser la classe d'importation pour importer les données depuis le fichier Excel
        Excel::import(new EtudiantsImport(), $fichier);

        // Rediriger vers la liste des étudiants avec un message de succès
        return redirect()->route('listedesetudiants')->with('success', 'Les étudiants ont été importés avec succès.');
    } catch (\Throwable $th) {
        // Gérer les erreurs d'importation
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation des étudiants : ' . $th->getMessage());
    }
}

//export
public function Exporteretudiants()
{
    return Excel::download(new EtudiantsExport, 'Etudiants.xlsx');
}


}
