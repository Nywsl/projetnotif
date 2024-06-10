<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Niveau;
use App\Models\etudiants;
use App\Models\ModaliteEtudiants;
use App\Models\ModaliteNiveau;
use App\Imports\EtudiantsImport;
use App\Exports\EtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ClasseController extends Controller
{
    /**
     * Affiche la liste des classes.
     */
    public function listesclasses()
    {
        $classes = Classe::all();
        return view('presets.AnneeAcademique.listesclasses', compact('classes'));
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
          $classe = $request->all();

        $classe = Classe::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'niveau_id' => $request->niveau_id,
            'annee_academique_id' => $request->annee_academique_id,

        ]);

        return redirect()->route('listesclasses')->with('success', 'Classe ajoutée avec succès.');
    }



    public function listesetudiants($id)
    {
        // Récupérer tous les étudiants depuis la base de données
        $etudiants = Etudiants::where('classe_id', $id)->get();

        // Retourner la vue avec la liste des étudiants
        return view('presets.classe.listeetudiants', compact('etudiants','id'));
    }
    public function ajoutetudiant(Request $request,$id)
    {

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|date',
            'contact' => 'required|string',
            'matricule' => 'required|string',

        ]);

        $etudiant= $request->all();
      $etudiant['classe_id']=$id;
      $etudiant['photo']='';
      $etudiant=Etudiants::create($etudiant);


      $classe = Classe::find($id);

      if($classe != null)
      {
         $niveau_id = $classe->niveau_id;

          $modalitesniveau = ModaliteNiveau::where('niveaux_id', $niveau_id)->get();

          foreach ($modalitesniveau as $modaliteniveau) {
            $modaliteetudiant=ModaliteEtudiants::create(['echeance'=>$modaliteniveau->echeance,'montant'=>$modaliteniveau->montant,'etudiant_id'=>$etudiant->id,'sms_envoye'=>false,'date_sms'=>new \DateTime(),'etat'=>'en_cours']);


      }


         $classes = Classe::where('niveau_id', $niveau_id)->get();
      }
         $this ->envoyerSMS('225'.$etudiant->contact, 'Bonjour , votre inscription à notre école est bien enregistrée. Merci de votre confiance.');
        return redirect()->route('classelisteetudiants',$id)->with('success', 'Étudiant ajouté avec succès.');


    }

    public function pageetudiant(Request $request,$id)
    {
    return view('presets.classe.ajoutetudiant', compact('id'));

    }

    public function editetudiant($id)
    {
        // Récupérez les informations de l'étudiant à partir de l'ID
    $etudiant = Etudiants::find($id);
        return view('presets.classe.classeediteetudiant', compact('etudiant'));
    }

    /**
     * Supprime un étudiant de la classe.
     */
    public function deleteetudiant(request $request,$id)
    {
        $etudiant = Etudiants::find($id); // Récupère l'étudiant avec l'identifiant donné
       if($etudiant){
        $etudiant->delete();
       }
       return back()->with('error','etudiant introuvable');
    }

public function updateetudiant(Request $request, $id)
{
    // Récupérez l'étudiant à partir de l'ID donné
    $etudiant = Etudiants::find($id);
    // Validez les données du formulaire
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'date_naissance' => 'required|date',
        'contact' => 'required|string',
        'matricule' => 'required|string',
    ]);


    // Mettez à jour les informations de l'étudiant avec les données du formulaire

    if($etudiant){
        $etudiant->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'date_naissance'=>$request->date_naissance,
            'contact'=>$request->contact,
            'matricule'=>$request->matricule
        ]);
    }
    // Redirigez l'utilisateur avec un message de succès
    return redirect()->route('classelisteetudiants', $etudiant->classe_id)->with('success', 'Étudiant mis à jour avec succès.');
}

public function importetudiant(Request $request)
{
    // Vérifier si un fichier a été téléchargé
    if ($request->hasFile('classe_file')) {
        // Valider le fichier
        $request->validate([
            'classe_file' => 'required|mimes:xlsx,xls',
        ]);

        // Récupérer le fichier téléchargé
        $file = $request->file('classe_file');

        // Importer les données du fichier Excel
        Excel::import(new EtudiantsImport(), $file);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Le fichier a été importé avec succès.');
    }

    // Rediriger avec un message d'erreur si aucun fichier n'a été téléchargé
    return redirect()->back()->with('error', 'Veuillez sélectionner un fichier à importer.');
}
//export
public function Exportetudiant()
{
    return Excel::download(new EtudiantsExport, 'Etudiants.xlsx');
}

private function envoyerSMS($numero, $message)
{
    // Informations de l'API SMS

$param = array(
    'username' => 'AITECH',
    'password' => 'Admin123@',
    'sender' => 'AITECH',
    'text' => $message,
    'type' => 'text',
    'datetime' => '2024-04-11 12:16:19',
);

$post = 'to=' .$numero;
foreach ($param as $key => $val) {
    $post .= '&' . $key . '=' . rawurlencode($val);
}
$url = "https://africasmshub.mondialsms.net/api/api_http.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
$result = curl_exec($ch);
if(curl_errno($ch)) {
    $result = "cURL ERROR: " . curl_errno($ch) . " " . curl_error($ch);
} else {
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    switch($returnCode) {
        case 200 :
            break;
        default :
            $result = "HTTP ERROR: " . $returnCode;
    }
}
curl_close($ch);
print $result;


}

}





