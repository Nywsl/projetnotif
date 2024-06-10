<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModaliteEtudiants;
use App\Models\Etudiants;
use App\Models\Classe;
use App\Models\Panier;
use App\Imports\ModaliteEtudiantsImport;
use App\Exports\ModaliteEtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ModaliteEtudiantsController extends Controller
{
  public function listemodaliteetudiant()
    {

        $modaliteEtudiant = ModaliteEtudiants::all();
        return view('presets.modaliteetudiant.listemodaliteetudiant', compact('modaliteEtudiant'));
    }

    public function pagemodaliteetudiant()
    {
        return view('presets.modaliteetudiants.ajoutmodaliteetudiant');
    }

    public function ajoutmodaliteetudiant(Request $request)
    {
        $request->validate([
            'echeance' => 'required|date',
            'montant' => 'required|numeric',
            'sms_envoye' => 'nullable|boolean',
            'date_sms' => 'nullable|date',
            'etat' => 'nullable|string|in:en_cours,annule',
            'etudiant_id' => 'required|exists:etudiants,id',
        ]);

        ModaliteEtudiants::create($request->all());

        return redirect()->route('listemodaliteetudiant')->with('success', 'Modalité étudiant ajoutée avec succès.');
    }
    public function listedesmodalitesenretard()
    {

        $modalites = DB::table('etudiants_retard')->get();

        return view('presets.modaliteetudiant.listemodaliteetudiant', compact('modalites'));
    }
    public function matetudiantmodalite(Request $request)
    {

          return view('presets.modaliteetudiant.matrimodalite');


    }

    public function listedesmodalitesproche()
    {

        $modalites = DB::table('etudiants_proche')->get();
        return view('presets.modaliteetudiant.listemodaliteproche', compact('modalites'));
    }


    //return view('presets.paiement.matripaiement');
    public function etudiantmodalite($id)
    {
        $classes = Classe::get();
   return view('presets.modaliteetudiant.etudiantmodalite',compact('classes','id'));

    }

    public function Exporteretard()
    {
        return Excel::download(new ModaliteEtudiantsExport, 'modaliteetudiants.xlsx');
    }

    public function matepagemodalite(request $request)
    {
        $etudiant = Etudiants::where('matricule',$request->matricule)->first();
        if($etudiant != null){
        $id=$etudiant->id;
        return redirect()->route('modaliteenretard',$id);}
        else {
            return back()->with('error', 'Étudiant non trouvé pour le matricule donné.');
        }
    }

    public function Importeretard()
    {
        Excel::import(new ModaliteEtudiantsImport, 'modaliteetudiants.xlsx');

        return redirect('/')->with('success', 'All good!');
    }


}
