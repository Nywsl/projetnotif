@extends('layouts.app', [
    'namePage' => 'Envoi de SMS en retard',
    'class' => 'sidebar-mini',
    'activePage' => 'envoi_sms_retard',
])

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Envoi de SMS en retard</h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informations sur l'envoi des SMS</h4>
                </div>
                <div class="card-body">
                    @if (isset($success))
                        <div class="alert alert-success" role="alert">
                            {{ $success }}
                        </div>
                    @elseif (isset($error))
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Noms</th>
                                <th>Classe</th>
                                <th>Contact</th>
                                <th>Montant à payer</th>
                                <th>Statut SMS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etudiants as $etudiant)
                                <tr>
                                    <td>{{ $etudiant->matricule }}</td>
                                    <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                                    <td>{{ $etudiant->classe }}</td>
                                    <td>{{ $etudiant->contact }}</td>
                                    <td>{{ $etudiant->montant }}</td>
                                    <td>
                                        @if ($etudiant->sms_envoye)
                                            Envoyé
                                        @else
                                            Non envoyé
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
