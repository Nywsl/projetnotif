@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">SMS d'échéance envoyés</h1>

        <!-- Afficher les détails des SMS d'échéance envoyés -->
        <div class="card mt-4">
            <div class="card-body">
                <h3 class="card-title">Détails des SMS d'échéance envoyés :</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($smsEcheance as $sms)
                                <tr>
                                    <td>{{ $sms->date }}</td>
                                    <td>{{ $sms->contenu }}</td>
                                    <td>{{ $sms->statut }}</td> <!-- Afficher le statut du SMS -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
