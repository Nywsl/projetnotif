<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;
use App\Models\ModaliteNiveau;

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
            'description' => 'nullable|string',
        ]);


        // Créer un niveau avec les données du formulaire et le chemin de la photo

        Niveau::create($request->all());

        return redirect()->route('listeniveaux')->with('success', 'Niveau ajouté avec succès.');
    }
    public function listemodaliteniveau($id)
    {
        $modaliteNiveau = ModaliteNiveau::where('niveaux_id', $id)->get();
        return view('presets.niveau.listemodaliteniveau', compact('modaliteNiveau', 'id'));
    }

    public function pagemodaliteniveau($id)

    {
        return view('presets.niveau.ajoutmodaliteniveau', compact('id'));
    }

    public function ajoutmodaliteniveau(Request $request, $id)
    {
       $request->validate([
            'echeance' => 'required|date',
            'montant' => 'required|numeric',

        ]);

$modalite= $request->all();
$modalite['niveaux_id']=$id;
       ModaliteNiveau::create($modalite);

        return redirect()->route('niveaulistemodalite',$id)->with('success', 'Modalité niveau ajoutée avec succès.');
    }


}


