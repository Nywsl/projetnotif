<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModaliteEtudiant;

class ModaliteEtudiantController extends Controller
{
    public function index()
    {
        $modalitesEtudiant = ModaliteEtudiant::all();
        return view('modalites_etudiant.index', compact('modalitesEtudiant'));
    }

    public function create()
    {
        return view('modalites_etudiant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'echeance' => 'required|date',
            'montant' => 'required|numeric',
            'sms_envoye' => 'required|boolean',
            'date_sms' => 'required|date',
            'etat' => 'required|string',
            'etudiant_id' => 'required|exists:etudiants,id',

        ]);

        ModaliteEtudiant::create($request->all());

        return redirect()->route('modalitesetudiant.index')->with('success', 'Modalité étudiant ajoutée avec succès.');
    }

    // Ajoutez d'autres méthodes au besoin...
}
