<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModaliteNiveau;
use App\Models\Niveau;

class ModaliteNiveauController extends Controller
{
    public function listemodaliteniveau()
    {
        $modaliteNiveau = ModaliteNiveau::all();
        return view('presets.modaliteniveau.listemodaliteniveau', compact('modaliteNiveau'));
    }

    public function pagemodaliteetudiant()

    {
        $niveaux = Niveau::all();
        return view('presets.modaliteniveau.ajoutmodaliteniveau', compact('niveaux'));
    }

    public function ajoutmodaliteniveau(Request $request)
    {
        $request->validate([
            'echeance' => 'required|date',
            'montant' => 'required|numeric',
            'niveau_id' => 'required|exists:niveau,id',
        ]);

        ModaliteNiveau::create($request->all());

        return redirect()->route('listemodaliteniveau')->with('success', 'Modalité niveau ajoutée avec succès.');
    }


}
