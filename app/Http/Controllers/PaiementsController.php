<?php

namespace App\Http\Controllers;

use App\Models\etudiants;
use App\Models\ModaliteEtudiants;
use Illuminate\Http\Request;
use App\Models\paiements;
use App\Models\Classe;
use vendor\Kkiapay\Kkiapay;



class PaiementsController extends Controller
{

    public function effectuerPaiement(Request $request)
    {
        // Initialiser l'objet Kkiapay avec les clés d'API du fichier .env
        $kkiapay = new \Kkiapay\Kkiapay(
            env('5b90b8809ed011eca5d0656c2d7c0a43'),
            env('tpk_5b90b8829ed011eca5d0656c2d7c0a43'),
            env('tsk_5b90df909ed011eca5d0656c2d7c0a43')
        );

        // Créer le paiement en utilisant la méthode createPayment() de l'objet $kkiapay
        $response = $kkiapay->createPayment([
            'amount' => $request->input('amount'), // Montant du paiement en centimes
            'description' => 'Achat sur votre site',
            'callback_url' => 'https://example.com/callback', // URL de callback pour recevoir les notifications de paiement
            // Autres paramètres du paiement
        ]);

        // Gérer la réponse de l'API Kkiapay
        if ($response['success']) {
            // Le paiement a été créé avec succès, vous pouvez rediriger l'utilisateur vers la page de paiement Kkiapay
            return redirect($response['payment_url']);
        } else {
            // Une erreur s'est produite lors de la création du paiement, gérer l'erreur
            $errorMessage = $response['message'];
            // Afficher un message d'erreur à l'utilisateur ou effectuer une autre action appropriée
        }
    }
    public function listedespaiements($id)
    {

        $etudiant = Etudiants::find($id);
        $modaliteetudiants= ModaliteEtudiants::where(['etudiant_id'=>$id,'etat'=>'en_cours'])->get();

        return view('presets.paiement.listedespaiements', compact('etudiant','modaliteetudiants'));
    }

    public function pagepaiement()
    {
        return view('paiements.page');
    }

    public function ajoutpaiement(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric',
            'transaction' => 'nullable|string',
            'etat' => 'nullable|string',
            'observation' => 'nullable|string',
            'etudiant_id' => 'required|exists:etudiants,id',
            'modalite_paiement_id' => 'required|exists:modalite_paiements,id',
        ]);

        paiements::create($request->all());

        return redirect()->route('listedespaiements')->with('success', 'Paiement ajouté avec succès.');
    }


    public function matpaiement(Request $request)
    {

          return view('presets.paiement.matripaiement');


    }


    //return view('presets.paiement.matripaiement');
    public function etudpaiement($id)
    {
        $classes = Classe::get();
   return view('presets.paiement.etudiantpaiement',compact('classes','id'));

    }

    public function matpagepaiement(request $request)
    {
        $etudiant = Etudiants::where('matricule',$request->matricule)->first();
        if($etudiant != null){
        $id=$etudiant->id;
        return redirect()->route('listedespaiements',$id);}
        else {
            return back()->with('error', 'Étudiant non trouvé pour le matricule donné.');
        }
    }

    public function panierpaiement(request $request)
    {
      $request->validate([
        'echeance' => 'required|date',
        'montant' => 'required|numeric',
      ]);

      return view('presets.paiement.panierpaiement');
    }

    public function ppagepaiement(request $request)
    {
        return view('presets.paiement.panpaiement');
    }
 }
