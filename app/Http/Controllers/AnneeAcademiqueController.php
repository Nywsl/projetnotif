<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeAcademique;
use App\Models\Classe;
use App\Models\Niveau;

class AnneeAcademiqueController extends Controller
{
    public function listeAnnee()
    {
             $anneesAcademiques = AnneeAcademique::all();
        return view('presets.AnneeAcademique.listeAnnee', compact('anneesAcademiques'));
    }

    public function pageannee()
    {
        return view('presets.AnneeAcademique.ajoutannee');
    }

    public function listesclasses($id)
    {
        $classes = Classe::where('annee_academique_id', $id)->get();
        return view('presets.AnneeAcademique.listesclasses',compact('classes','id'));
    }


    public function pageclasse($id)
    {

        $niveaux = Niveau::all();
        return view('presets.AnneeAcademique.ajoutclasse', compact('niveaux','id'));
    }
    public function ajoutclasses(Request $request,$id)
    {


        $request->validate([
            'libelle' => 'required|string',
            'niveau_id' => 'required|exists:niveaux,id',
            'description' => 'required|string',



        ]);

        $classe = Classe::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'niveau_id' => $request->niveau_id,
            'annee_academique_id' => $id,



        ]);

        return redirect()->route('anneelisteclasse',$id)->with('success', 'Classe ajoutée avec succès.');
    }

    public function ajoutAnnee(Request $request)
    {
        $request->validate([
            'debut' => 'required|integer',
            'fin' => 'required|integer',
            'date_debut' => 'required|date',
            'description' => 'nullable|string',

        ]);

        $annee = $request->all();
        $annee['actif']=true;
        //AnneeAcademique::where(['actif'=>1])->update(['actif'=>0]);

        AnneeAcademique::create($annee);



        return redirect()->route('listeAnnee')->with('success', 'Année académique ajoutée avec succès.');
    }
       // Méthode pour afficher le formulaire de modification d'une année académique
       public function editannee($id)
       {
           $annee = AnneeAcademique::find($id);
           return view('presets.AnneeAcademique.anneedite', compact('annee'));
       }

       // Méthode pour mettre à jour une année académique
       public function updateannee(Request $request, $id)
       {
           $request->validate([
               'debut' => 'required|integer',
               'fin' => 'required|integer',
               'date_debut' => 'required|date',
               'description' => 'nullable|string',
           ]);

           $annee = AnneeAcademique::find($id);
           $annee->update($request->all());

           return redirect()->route('listeAnnee')->with('success', 'Année académique mise à jour avec succès.');
       }

       // Méthode pour supprimer une année académique
       public function deleteannee($id)
       {
           $annee = AnneeAcademique::find($id);
           if ($annee) {
               $annee->delete();
               return back()->with('success', 'Année académique supprimée avec succès.');
           }
           return back()->with('error', 'Année académique introuvable.');
       }
}
