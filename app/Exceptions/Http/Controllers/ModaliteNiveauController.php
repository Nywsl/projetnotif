<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModaliteNiveau;

class ModaliteNiveauController extends Controller
{
    public function index()
    {
        $modalitesNiveau = ModaliteNiveau::all();
        return view('modalites_niveau.index', compact('modalitesNiveau'));
    }

    public function create()
    {
        return view('modalites_niveau.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'echeance' => 'required|date',
            'montant' => 'required|numeric',
            'niveau_id' => 'required|exists:niveaux,id',
        ]);

        ModaliteNiveau::create($request->all());

        return redirect()->route('modalitesniveau.index')->with('success', 'Modalité niveau ajoutée avec succès.');
    }

    // Ajoutez d'autres méthodes au besoin...
}
