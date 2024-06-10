@extends('layouts.app', [
  'namePage' => 'Liste des Niveaux',
  'class' => 'sidebar-mini',
  'activePage' => 'liste des Niveaux',
])

@section('content')
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Listes des Niveaux</h2>
    </div>
  </div>
  <div class="content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-round text-white pull-right" href="{{route('pageaniveau')}}">Ajouter un Niveau</a>
              <h4 class="card-title">Liste des Niveaux</h4>
              <div class="col-12 mt-2">
            </div>
            </div>
            <div class="card-body">
              <div class="toolbar">
              </div>
              <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th scope="col">libelle</th>
                    <th scope="col">description</th>
                    <th scope="col">echeance</th>
                    <th scope="col">montant</th>
                    <th scope="col">niveau_id</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="disabled-sorting text-right"></th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($niveaux as $niveau)
                    <tr>
                      <th scope="row">{{$loop->index+1}}</th>
                      <td>{{$niveau->libelle}}</td>
                      <td>{{$niveau->description}}</td>
                      @if ($niveau->modaliteNiveau)
                        <td>{{$niveau->modaliteNiveau->echeance}}</td>
                        <td>{{$niveau->modaliteNiveau->montant}}</td>
                        <td>{{$niveau->modaliteNiveau->niveau_id}}</td>
                      @else
                        <td>Non défini</td>
                        <td>Non défini</td>
                        <td>Non défini</td>
                      @endif
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <a href="{{ route('niveaulistemodalite', $niveau->id) }}" class="btn btn-info btn-sm btn-icon">
                            <i class="now-ui-icons design_app"></i></a>
                    </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
