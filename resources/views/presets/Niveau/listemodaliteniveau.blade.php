@extends('layouts.app', [
  'namePage' => 'Liste des modalités',
  'class' => 'sidebar-mini',
  'activePage' => 'liste des modalités',
])

@section('content')
<div class="panel-header">
  <div class="header text-center">
    <h2 class="title">Listes des modalités</h2>
  </div>
</div>
<div class="content">
  <div class="row">
    <div class="card">
      <div class="card-header">
        <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('niveaupagemodalite',$id) }}">Ajouter une modalite</a>
        <h4 class="card-title">Liste des modalités</h4>
      </div>
      <div class="card-body">
        <div class="toolbar">
        </div>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">Echéance</th>
              <th scope="col">Montant</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="disabled-sorting text-right"></th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($modaliteNiveau as $modaliteNiveau)
            <tr>
              <td>{{ $modaliteNiveau->echeance }}</td>
              <td>{{ $modaliteNiveau->montant }}</td>
              <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                  <i class="now-ui-icons ui-2_settings-90"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
