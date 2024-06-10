<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModalitePaiements;

class ModalitePaiementController extends Controller
{
    public function index()
    {
        $modalitesPaiement = ModalitePaiements::all();
        return view('modalites_paiement.index', compact('modalitesPaiement'));
    }

    public function create()
    {
        return view('modalites_paiement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'paiement_id' => 'required|exists:paiements,id',
        ]);

        ModalitePaiements::create($request->all());

        return redirect()->route('modalitespaiement.index')->with('success', 'Modalité de paiement ajoutée avec succès.');
    }
    

    // Ajoutez d'autres méthodes au besoin...
}
