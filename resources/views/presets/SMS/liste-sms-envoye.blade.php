@extends('layouts.app', [
    'namePage' => 'liste-sms-envoyes',
    'class' => 'sidebar-mini',
    'activePage' => 'liste-sms-envoyes',
])

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Liste des SMS Envoyés</h2>
        </div>
    </div>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">SMS Envoyés</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead class=" text-primary">
                                    <tr><th>
                                    Destinataire
                                    </th>
                                    <th>
                                    Expediteur
                                    </th>
                                    <th>
                                    Date d'envoi
                                    </th>
                                    <th class="text-right">
                                    Status sms
                                    </th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                    <td>
                                    
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td class="text-right">

                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
