@extends('layouts.template', [
  'namePage' => '',
  'class' => 'sidebar-mini',
  'activePage' => 'modalite',
  'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')
  <div class="content text-white">
    <div class="row justify-content-center">
      <div class="col-md-10 d-flex justify-content-between align-items-start">
        <div class="p-4">
          <h4 class="card-title">Etudiant</h4>
          <div>
            Nom: <span class="font-weight-bold" style="font-size: 23px;">{{$etudiant->nom}}</span>
          </div>
          <div>
            Prénom: <span class="font-weight-bold" style="font-size: 23px;">{{$etudiant->prenom}}</span>
          </div>
          <div>
            Classe: <span class="font-weight-bold" style="font-size: 23px;">{{$etudiant->classe->libelle}}</span>
          </div>
          <div>
            Matricule: <span class="font-weight-bold" style="font-size: 23px;">{{$etudiant->matricule}}</span>
          </div>
        </div>

        <div class="p-2 flex-grow-1">
          <div class="">
            <div class="card-header">
              <h4 class="card-title text-white">Modalités</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('panierajout')}}" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered text-white" cellspacing="0" width="100%">
                    <thead class="text-primary">
                      <tr>
                        <th scope="col" style="vertical-align: inherit;">&nbsp;</th>
                        <th scope="col" style="vertical-align: inherit;">Échéance</th>
                        <th scope="col" style="vertical-align: inherit;" class="text-right">Montant</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($modaliteetudiants as $modaliteetudiant)
                        <tr>
                          <td>
                            @if(in_array($modaliteetudiant->id, $modalitesids))
                              <i class="now-ui-icons shopping_bag-16"></i>
                            @else
                              <input style="background: transparent;" data-montant="{{$modaliteetudiant->montant}}" type="checkbox" name="modalites[]" value="{{$modaliteetudiant->id}}">
                            @endif
                          </td>
                          <td>{{$modaliteetudiant->echeance}}</td>
                          <td class="text-right">{{$modaliteetudiant->montant}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <!-- <td>Total</td>
                        <td colspan="2" class="text-right">
                          <h5 id="total">0</h5>
                        </td> -->
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <a href="{{ route('login') }}" class="btn btn-primary pull-left mr-2">login</a>
                <button type="submit" class="btn btn-primary pull-right">Continuer le paiement </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  const calculer = () => {
    const montants = [];
    $('input:checkbox:checked[name^="modalites"][data-montant]').each(function() {
      montants.push(parseInt($(this).data('montant')));
    });
    let total = 0;
    if (montants.length > 0) {
      total = montants.reduce((a, b) => a + b, 0);
    }
    $('#total').html(total + ' FCFA');
  }

  $(function() {
    $('input:checkbox[name^="modalites"][data-montant]').on('input', function(e) {
      calculer();
    });
  });

  $(document).ready(function() {
    demo.checkFullPageBackgroundImage();
  });
</script>
@endpush
