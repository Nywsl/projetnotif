@extends('layouts.template', [
    'namePage' => 'modalite',
    'class' => 'sidebar-mini',
    'activePage' => 'modalite',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')

    <div class="content text-white">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <div class="">
                        <h4 class="card-title">Panier</h4>
                        <div class="col-12 mt-2"></div>
                    </div>
                    <div class="card-body">
                        <div class="toolbar"></div>
                        <form method="POST" action="{{ route('panierafficher') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th scope="col" style="vertical-align: inherit;">Échéance</th>
                                            <th scope="col" style="vertical-align: inherit;" class="text-right">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paniers as $panier)
                                            <tr>
                                                <td>{{ $panier->modaliteEtudiants->echeance }}</td>
                                                <td class="text-right">{{ $panier->modaliteEtudiants->montant }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td colspan="2" class="text-right">
                                                <h5 id="total">{{ $somme }}</h5>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <kkiapay-widget   amount="{{ $somme }}"
                            key="5b90b8809ed011eca5d0656c2d7c0a43"
                                position="center"
                                sandbox="true"
                                data="{{ $session }}"
                                callback="<url-de-redirection-quand-le-paiement-est-reussi>">
                            </kkiapay-widget>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
@endpush
