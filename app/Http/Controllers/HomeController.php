<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use Illuminate\Http\Request;
use App\models\Classe;
use App\Models\etudiants;
use App\Models\Niveau;
use App\Models\User;
use carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $classe=0;
        $etudiant=0;
        $niveau=0;
        $users= [];
        $etudiantenretard=0;
        $etudiantajour=0;
        $etudiantaavertir=0;
        $sql= [];
        $hier=[];
        $datelimite=[];
        $date=[];
       
        $anneeacademique = AnneeAcademique::where('actif', 1)->first();
        if($anneeacademique != null){
           $aid= $anneeacademique->id;
            $classe= Classe::where('annee_academique_id', $anneeacademique->id)->count();
            $etudiant= Etudiants::whereHas('classe', function ($query) use($aid){
            $query->where('annee_academique_id', $aid);
            })->count();

            $date= Carbon::today();
            $datelimite= Carbon::today()->addDays(3);
            $hier= Carbon::yesterday();
            $etudiantenretard= Etudiants::whereHas('modaliteetudiants', function ($query) use($hier){
            $query->where('echeance','<=', $hier)->where('etat','=','en_cours');
            }, '>=', 1)->count();

            $etudiantajour= Etudiants::whereHas('modaliteetudiants', function ($query) use($datelimite){
                $query->where('echeance','<=', $datelimite)->where('etat','=','en_cours');
                }, '=', 0)->count();


                $etudiantaavertir= Etudiants::whereHas('modaliteetudiants', function ($query) use($hier){
                    $query->where('echeance','<=', $hier)->where('etat','=','en_cours');
                    }, '=', 0)->whereHas('modaliteetudiants', function ($query) use($datelimite,$date){
                        $query->whereBetween('echeance', [$date,$datelimite])->where('etat','=','en_cours');
                        }, '>=', 1)->count();

                        $sql= Etudiants::whereHas('modaliteetudiants', function ($query) use($hier){
                            $query->where('echeance','<=', $hier)->where('etat','=','en_cours');
                            }, '=', 0)->whereHas('modaliteetudiants', function ($query) use($datelimite,$date){
                                $query->whereBetween('echeance', [$date,$datelimite])->where('etat','=','en_cours');
                                }, '>=', 1)->tosql();

        }

        $niveau= Niveau::count();
        $users= User::all();
        return view('home',compact('classe','etudiant','niveau','users','etudiantenretard',
        'etudiantajour','etudiantaavertir','sql','hier','datelimite','date'));



    }





}
