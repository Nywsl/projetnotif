@extends('layouts.app', [
  'namePage' => 'modaliteenretard',
  'class' => 'sidebar-mini',
  'activePage' => 'modaliteenretard',
])

@section('content')
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Modalités en retard</h2>
    </div>
  </div>
  <div class="content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <!-- Formulaire d'importation -->
                <form action="{{ route('Importeretudiantsretard') }}" method="POST" enctype="multipart/form-data" class="pull-right">
                    @csrf
                    <input type="file" name="fichier" class="btn btn-primary btn-round text-white pull-right" style="display: none;" id="fileInput" onchange="$('#upload-file-info').html($(this).val());">
                    <label for="fileInput" class="btn btn-primary btn-round text-white pull-right"><i class="now-ui-icons arrows-1_cloud-upload-94"></i>Importer</label>
                    <span class='label label-info' id="upload-file-info"></span>
                </form>
                <!-- Fin du formulaire d'importation -->
                <a href="{{ route('Exporteretudiantsretard') }}" class="btn btn-primary btn-round text-white pull-right"><i class="now-ui-icons arrows-1_cloud-download-93"></i> Exporter</a>

              <h4 class="card-title">Modalités en retard</h4>
              <div class="col-12 mt-2">
            </div>
            </div>
            <div class="card-body">
              <div class="toolbar">
              </div>
              <form method="POST" action="#" enctype="multipart/form-data"  >
              <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class=" text-primary">
                    <tr>
                        <th scope="col" style="vertical-align: inherit;">Matricule </th>
                        <th scope="col" style="vertical-align: inherit;">Noms</th>
                        <th scope="col" style="vertical-align: inherit;">Classe</th>
                        <th scope="col" style="vertical-align: inherit;">contact</th>
                        <th scope="col" style="vertical-align: inherit;" class="text-right">Montant à payer </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($modalites as $modalite)
                    <tr>
                      <td>{{$modalite->matricule}}</td>
                       <td> {{$modalite->nom}} {{$modalite->prenom}}</td>
                       <td>{{$modalite->libelle}}</td>
                       <td>{{$modalite->contact}}</td>
                       <td class="text-right">{{$modalite->montant}}</td>
                    </tr>
                    @endforeach


                    </tbody>

              </table>
              <a href="{{route('smsretard')}}" class="btn btn-primary "> Envoyer SMS</a>

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

