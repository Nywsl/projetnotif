<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModaliteEtudiants;
use App\Models\Etudiants;
use App\Models\Classe;
use App\Models\Panier;


class PanierController extends Controller
{
    public function listemodalite($id,request $request)
    {
        $modalitesids=[];

        $etudiant = Etudiants::find($id);
        $modaliteetudiants= ModaliteEtudiants::where(['etudiant_id'=>$id,'etat'=>'en_cours'])->get();
        $modalitespaniers = panier::where('section', $request->session()->getId())->get();
        foreach($modalitespaniers as $modalitespanier){
           array_push($modalitesids,$modalitespanier->modaliteetudiant_id);
        }

        return view('presets.panier.listemodaliteetudiant', compact('etudiant','modaliteetudiants','modalitesids'));
    }
    public function matriculemodalite(Request $request)
    {
          return view('presets.panier.matripaniermodalite');

    }

    //return view('presets.paiement.matripaiement');
    public function etudiantmodalite($id)
    {
        $classes = Classe::get();
   return view('presets.panier.etudiantmodalite',compact('classes','id'));

    }

    public function matepagepanier(request $request)
    {
        $etudiant = Etudiants::where('matricule',$request->matricule)->first();
        if($etudiant != null){
        $id=$etudiant->id;
        return redirect()->route('listemodalitepanier',$id);}
        else {
            return back()->with('error', 'Étudiant non trouvé pour le matricule donné.');
        }
    }
   public function ajoutpanier(request $request)
    {
        $modalites = $request->input('modalites');

    // Vérification que 'modalites' est bien un tableau
    if (is_array($modalites) && !empty($modalites)) {
        $session = $request->session()->getId();

        foreach ($modalites as $modalite) {
            $panier = new Panier();
            $panier->modaliteetudiant_id = intval($modalite);
            $panier->section = $session;
            $panier->save();
        }

        return redirect()->route('panierafficher');

    }
}


    public function afficherpanier(request $request)
    {
        $somme=0;

        $session = $request->session()->getId();
        $paniers = Panier::with('modaliteEtudiants')->where('section', $request->session()->getId())->get();
        foreach($paniers as $panier){

            $somme = $somme + $panier->modaliteEtudiants->montant;

        }

        return view('presets.panier.afficherpanier', compact('paniers','somme','session'));
    }



}
