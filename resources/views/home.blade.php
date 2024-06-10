@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
])

@section('content')
    <div class="<!--panel-header panel-header-lg-->">
        <canvas id="bigDashboardChart"></canvas>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-chart bg-info text-center text-capitalize text-white">
                    <h1 class="card-title ">{{ $etudiant }} </h1>
                    <p>etudiant(s)</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card card-chart bg-success text-center text-capitalize text-white">
                    <h1 class="card-title ">{{ $classe }} </h1>
                    <p>classe(s)</p>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="card card-chart bg-primary text-center text-capitalize text-white">
                    <h1 class="card-title ">{{ $niveau }} </h1>
                    <p>Niveau(X)</p>
                </div>
            </div>


        </div>

        <div class="row align-items-stretch">
            <div class="col-sm-6">
            <div class="card mx-1 p-2">
                <h4 class="text-center">Etat des paiements</h4>
                <canvas id="chart-etat-modalites"></canvas>
                @if ($etudiantenretard > 0 || $etudiantaavertir > 0)
                    <a href="{{route('resultat_sms')}}" class="btn btn-danger "> Envoyé des sms d'avertissement</a>
                @endif
            </div>
            </div>
            <div class="col-sm-6">
            <div class="card mx-1 p-2" style="height: calc(100% - 20px)">
                <h4 class="text-center">Liste des utilisateurs</h4>
                <ul class="list-group list-group-numbered no-border">
                    @foreach ($users as $user )
                        <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold h6">{{ $user->name }}</div>
                            {{ $user->email }}
                        </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>

    </div>
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                // Javascript method's body can be found in assets/js/demos.js
                //demo.initDashboardPageCharts();
                const data = {
                    labels: [
                        'A jour',
                        'Proche',
                        'En retard'
                    ],
                    datasets: [{
                        label: 'ETAT DES MODALITES DES ETUDIANTS',
                        data: [{{$etudiantajour}}, {{$etudiantaavertir}}, {{$etudiantenretard}}],
                        backgroundColor: [
                            '#18ce0f',
                            '#FFB236',
                            '#FF3636'
                        ],
                        hoverOffset: 4
                    }]
                };

                const config = {
                    type: 'doughnut',
                    data: data,
                };
                const myChart = new Chart(
                    document.getElementById('chart-etat-modalites'),
                    config
                );
            });
        </script>
    @endpush
