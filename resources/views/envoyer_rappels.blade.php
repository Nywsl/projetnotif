@extends('layouts.app', [
    'namePage' => 'Envoyer_Rappels',
    'class' => 'login-page sidebar-mini',
    'activePage' => 'envoyer_rappels',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
])

@section('content')
    <div class="panel-header panel-header-lg">
        <h3 class="text-center">Envoyer des SMS d'avertissement</h3>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-info text-white pull-right ml-2" href="#">Démarrer le versement</a>
                        <a class="btn btn-danger text-white pull-right" href="#">Annuler</a>
                        <h4 class="card-title">Étudiants</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Numéro</th>
                                        <th>Statut de Livraison</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->nom }}</td>
                                        <td>{{ $etudiant->prenom }}</td>
                                        <td>{{ $etudiant->contact }}</td>
                                        <td>Statut de Livraison ici</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
