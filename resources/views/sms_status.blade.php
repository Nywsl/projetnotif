@extends('layouts.app', [
    'namePage' => 'Statut des SMS',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'sms-status',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statut des SMS</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-{{ $smsSent ? 'success' : 'warning' }}" role="alert">
                            @if($smsSent)
                                Les SMS d'avertissement ont été envoyés avec succès.
                            @else
                                Aucun SMS n'a été envoyé pour le moment.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
