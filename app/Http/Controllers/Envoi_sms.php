<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Etudiants;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Curl\Curl;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx\ContentTypes;

class SmsStatus
{

    public function __construct(public string $matricule, public string $nom, public string $prenom, public string $contact, public string $montant, public bool $statut, public string $libelle)
    {

    }
}




class Envoi_sms extends Controller
{

    /**
     * Envoie un SMS de félicitations à tous les nouveaux étudiants inscrits aujourd'hui.
     */
    public function envoyerFelicitationsInscription()
    {
        // Récupérer tous les nouveaux étudiants inscrits aujourd'hui
        $nouveauxEtudiants = Etudiants::whereDate('created_at', Carbon::today())->get();

        // Envoyer un SMS de félicitations à chaque nouveau étudiant
        foreach ($nouveauxEtudiants as $etudiant) {
            // Composer le message
            $message = "Bonjour " . $etudiant->prenom . ", félicitations pour votre inscription a notre ecole";
            // Appeler la fonction d'envoi de SMS avec le numéro de téléphone et le message
            $this->envoyerSMS($etudiant->contact, $message);
        }
    }

    /**
     * Envoie un SMS de rappel d'échéance aux étudiants concernés.
     */
    public function envoyerRappelsEcheance()
    {
        $numeros = [];
        $status_sms = [];


        $echeanceretard = DB::table('etudiants_retard')->get();
        // Envoyer un SMS de rappel à chaque étudiant
        foreach ($echeanceretard as $etudiant) {
            array_push($numeros, '225' . $etudiant->contact);
        }

        $message = "Bonjour, ceci est un rappel que vous avez un retard de paiement. Merci de prendre les mesures nécessaires. Cliquez sur ce lien ci-dessous pour effectuer un paiement en ligne. https://aitech.tn/retards";
        // Envoyer le SMS aux numéros de téléphone
        $result = $this->envoyerSMS(implode(';', $numeros), $message);

        foreach ($echeanceretard as $etudiant) {
            $status = new SmsStatus($etudiant->matricule, $etudiant->nom, $etudiant->prenom, $etudiant->contact, $etudiant->montant, in_array('225' . $etudiant->contact, $result['reussites']),$etudiant->libelle);
            array_push($status_sms,  $status);
        }

        return view('resultat_sms', compact('status_sms'));

    }


    /**
     * Envoie un SMS en utilisant l'API SMS fournie.
     */
    private function envoyerSMS($numero, $message)
    {
        // dd($this->checkUnsupportedCharacters($message));
        $reussites = [];
        $echecs = [];

        // Informations de l'API SMS
        $param = array(
            'username' => 'AITECH',
            'password' => 'Admin123@',
            'sender' => 'AITECH',
            'text' => $message,
            'type' => 'text',
            'datetime' => '2024-04-11 12:16:19',

            'to' => $numero
        );

        // $post = 'to=' . $numero;
        // foreach ($param as $key => $val) {
        //     $post .= '&' . $key . '=' . rawurlencode($val);
        // }
        // https://www.example.com/search?q=keyword
        $curl = new Curl();
        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curl->setOpt(CURLOPT_TIMEOUT, 30);
        $curl->setOpt(CURLOPT_HTTPHEADER, array("Connection: close"));
        //$curl->setOpt(CURLOPT_ACCEPT_ENCODING, '');
        $curl->post('https://africasmshub.mondialsms.net/api/api_http.php', $param);
        // $url = "https://africasmshub.mondialsms.net/api/api_http.php";
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
        // $result = curl_exec($ch);
        if ($curl->error) {
            $result = "cURL ERROR: " . $curl->errorCode . " " . $curl->errorMessage;
        } else {//
            //$returnCode = $curl->response->code;//(int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // switch ($returnCode) {
            // case 200:
            //     break;
            // default:
            //     $result = "HTTP ERROR: " . $returnCode;
            //}
        }
        //curl_close($ch);

        //dd($curl->response);
        $result = $curl->response;
        $arrays = explode(':', $result);
        $messageId = trim($arrays[1]);
        $result = $this->verifierAccuseReception($messageId);
        return $result;

    }

    public function verifierAccuseReception($messageId)
    {
        $reussites = [];
        $echecs = [];

        // Informations de l'API d'accusé de réception
        $username = 'AITECH';
        $password = 'Admin123@';
        $messageId = 'f948fada-2019-11ef-8f7f-0cc47a018caf';
        $url = "https://africasmshub.mondialsms.net/api/api_http_dlr.php?username={$username}&password={$password}&msgid={$messageId}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            $result = "cURL ERROR: " . curl_errno($ch) . " " . curl_error($ch);
        } else {
            $returnCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            switch ($returnCode) {
                case 200:
                    break;
                default:
                    $result = "HTTP ERROR: " . $returnCode;

            }
        }
        curl_close($ch);
        $json = json_decode($result, true);
        $dlr = $json['dlr'];
        foreach ($dlr as $d) {
            if ($d['err'] == '000') {
                $reussites[] = $d['receiver'];
            } else {
                $echecs[] = $d['receiver'];
            }
        }

        return ['reussites' => $reussites, 'echecs' => $echecs];
    }


    public function afficherFormulaire()
    {
        return view('presets.sms.liste-sms-envoye');
    }

    public function envoisms()
    {
        $etudiants = Etudiants::all();
        return view('presets.sms.envoyer-sms', compact('etudiants'));
    }

    public function sendCustomMessage(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'etudiants' => 'required|array',
            'message' => 'required|string',
        ]);

        // Récupérer les ID des étudiants sélectionnés
        $etudiants = $validatedData['etudiants'];

        // Récupérer les détails des étudiants sélectionnés
        $etudiants = Etudiants::find($etudiants);

        // Envoyer un SMS personnalisé à chaque étudiant
        foreach ($etudiants as $etudiant) {
            // Composer le message personnalisé
            $message = $validatedData['message'];

            // Appeler la fonction d'envoi de SMS avec le numéro de téléphone de l'étudiant et le message
            $this->envoyerSMS($etudiant->contact, $message);
        }

        // Rediriger avec un message de succès
        return redirect()->route('envoyer-sms')->with('success', 'Messages envoyés avec succès');
    }

    public function envoismsretard()
    {
        // Tableau
        $numeros = [];
        $status_sms = [];


        $echeanceretard = DB::table('etudiants_retard')->get();
        // Envoyer un SMS de rappel à chaque étudiant
        foreach ($echeanceretard as $etudiant) {
            array_push($numeros, '225' . $etudiant->contact);
        }

        $message = "Bonjour, ceci est un rappel que vous avez un retard de paiement. Merci de prendre les mesures nécessaires. Cliquez sur ce lien ci-dessous pour effectuer un paiement en ligne. https://aitech.tn/retards";
        // Envoyer le SMS aux numéros de téléphone
        $result = $this->envoyerSMS(implode(';', $numeros), $message);

        foreach ($echeanceretard as $etudiant) {
            $status = new SmsStatus($etudiant->matricule, $etudiant->nom, $etudiant->prenom, $etudiant->contact, $etudiant->montant, in_array('225' . $etudiant->contact, $result['reussites']),$etudiant->libelle);
            array_push($status_sms,  $status);
        }

        return view('resultat_sms', compact('status_sms'));

    }

    public function envoismsproche()
    {
        // Tableau
        $numeros = [];

        $echeanceretard = DB::table('etudiants_proche')->get();
        // Envoyer un SMS de rappel à chaque étudiant
        foreach ($echeanceretard as $etudiant) {
            array_push($numeros, '225' . $etudiant->contact);
        }

        $message = "Bonjour, ceci est un rappel que vous êtes proche de votre paiement scolaire. Merci de prendre les mesures nécessaires. Cliquez sur ce lien ci-dessous pour effectuer un paiement en ligne. https://aitech.tn/proche";
        $result = $this->envoyerSMS(implode(';', $numeros), $message);

        return view('resultat_sms', compact('status_sms'));
    }

}
