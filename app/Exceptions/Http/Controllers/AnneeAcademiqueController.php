<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeAcademique;

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

    public function ajoutAnnee(Request $request)
    {
        $request->validate([
            'Annee_Academique' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
            'actif' => 'nullable|boolean',
        ]);

        AnneeAcademique::create($request->all());

        return redirect()->route('listeAnnee')->with('success', 'Année académique ajoutée avec succès.');
    }
}
