<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;

class NiveauController extends Controller
{
    public function listeniveaux()
    {
        $niveaux = Niveau::all();
        return view('presets.niveau.listeniveaux', compact('niveaux'));
    }

    public function pageaniveau()
    {
        return view('presets.niveau.ajoutniveau');
    }

    public function ajoutniveau(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'statut' => 'required|string',
            'description' => 'required|string',
        ]);


        Niveau::create([
            'libelle' => $request->libelle,
            'statut' => $request->statut,
            'description' => $request->description,

 ]);



        return redirect()->route('listeniveaux')->with('success', 'Niveau ajouté avec succès.');
    }
}
