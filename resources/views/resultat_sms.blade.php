@extends('layouts.app', [
    'namePage' => 'modaliteenretard',
    'class' => 'sidebar-mini',
    'activePage' => 'modaliteenretard',
])

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title"></h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col" style="vertical-align: inherit;">Matricule </th>
                                <th scope="col" style="vertical-align: inherit;">Noms</th>
                                <th scope="col" style="vertical-align: inherit;">Classe</th>
                                <th scope="col" style="vertical-align: inherit;">contact</th>
                                <th scope="col" style="vertical-align: inherit;" class="text-right">Montant à payer </th>
                                <th scope="col" style="vertical-align: inherit;" >Statut </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($status_sms as $modalite)
                            <tr>
                              <td>{{$modalite->matricule}}</td>
                               <td> {{$modalite->nom}} {{$modalite->prenom}}</td>
                               <td>{{$modalite->libelle}}</td>
                               <td>{{$modalite->contact}}</td>
                               <td class="text-right">{{$modalite->montant}}</td>
                               <td >@if ($modalite->statut)

                                   <span class="badge badge-success">Message Envoyé</span>

                               @else

                                   <span class="badge badge-danger">Message Non Envoyé</span>

                               @endif</td>

                            </tr>
                            @endforeach


                            </tbody>

                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
