@extends('layouts.app', [
  'namePage' => 'Liste des paiements',
  'class' => 'sidebar-mini',
  'activePage' => 'liste des paiements',
])

@section('content')
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Listes des paiements</h2>
    </div>
  </div>
  <div class="content">
    <div class="row">
        <div class="card">
            <div class="card-header">

              <h4 class="card-title">Liste des Paiements</h4>
              <div class="col-12 mt-2">
            </div>
            </div>
            <div class="card-body">
              <div class="toolbar">
              </div>
              <form method="POST" action="" enctype="multipart/form-data"  >
              <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class=" text-primary">
                    <tr>
                        <th scope="col" style="vertical-align: inherit;">&nbsp </th>
                        <th scope="col" style="vertical-align: inherit;">Echeance</th>
                        <th scope="col" style="vertical-align: inherit;" class="text-right">Montant</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($modaliteetudiants as $modaliteetudiant)
                    <tr>
                      <td><input data-montant="{{$modaliteetudiant->montant}}" type="checkbox" name="modalites[]" value="{{$modaliteetudiant->id}}"></td>
                       <td>{{$modaliteetudiant->echeance}}</td>
                       <td class="text-right">{{$modaliteetudiant->montant}} FCFA</td>
                    </tr>
                    @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <td >Total</td>
                            <td  colspan="2" class="text-right"><h5 id="total">0</h5></td>
                        </tr>
                    </tfoot>
              </table>

              <button type="submit" class="btn btn-primary pull-right">mettre au panier</button>
              </form>

            <!-- end content-->
          </div>
        </div>
    </div>
  </div>

@endsection
@push('js')

<script>
    const calculer= () => {
        const montants= []
        $('input:checkbox:checked[name^="modalites"][data-montant]').each(function() {
    montants.push(parseInt($(this).data('montant')));
        })
        let total= 0
        if(montants.length > 0){
            total= montants.reduce((a, b) => a + b, 0);
        }
        $('#total').html(total+' FCFA')
    }
        $(function(){
            $('input:checkbox[name^="modalites"][data-montant]').on('input', function(e) {
    calculer()
            })
        })
      </script>

@endpush





