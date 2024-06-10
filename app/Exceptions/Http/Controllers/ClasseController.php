<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Niveau;

class ClasseController extends Controller
{
    /**
     * Affiche la liste des classes.
     */
    public function listesclasses()
    {
        $classes = Classe::all();
        return view('presets.classe.listesclasses', compact('classes'));
    }

    /**
     * Affiche le formulaire d'ajout d'une classe.
     */
    public function pageclasse()
    {
        $niveaux = Niveau::all();
        return view('presets.classe.ajoutclasses', compact('niveaux'));
    }

    /**
     * Enregistre une nouvelle classe.
     */
    public function Ajoutclasse(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'description' => 'required|string',
            'niveau_id' => 'required|exists:niveaux,id',
        ]);

        $classe = Classe::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'niveau_id' => $request->niveau_id,
        ]);

        return redirect()->route('listesclasses')->with('success', 'Classe ajoutée avec succès.');
    }
}
