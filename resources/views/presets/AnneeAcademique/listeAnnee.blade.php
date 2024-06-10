@extends('layouts.app', [
  'namePage' => 'liste des Année',
  'class' => 'sidebar-mini',
  'activePage' => 'listeAnnee',
])


@section('content')
 <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Listes des Etudiants</h2>
    </div>
  </div>
  <div class="content">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('pageannee')}}">Ajouter une nouvelle</a>
                <h4 class="card-title">Année Académique</h4>
              <div class="col-12 mt-2">
            </div>
            </div>
            <div class="card-body">
              <div class="toolbar">
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">Année Académique</th>
                                <th scope="col">Date de début</th>
                                <th scope="col"></th>
                              <!--  <th scope="col">Date de fin</th>-->
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anneesAcademiques as $annee)
                            <tr>
                               <td>{{ $annee->debut }}-{{ $annee->fin }}</td>
                               <td>{{ $annee->date_debut }}</td>
                               <td>{{ $annee->date_fin }}</td>
                               <td>{{ $annee->actif ? 'En cours' : 'Non en cours' }}</td>

                               <td class="td-actions text-right">
                                <a href="{{ route('anneelisteclasse', $annee->id) }}" class="btn btn-info btn-sm btn-icon">
                                    <i class="now-ui-icons design_app"></i></a>
                                <!--<a href="{{ route('anneeedite', ['id' => $annee->id]) }}" class="btn btn-success btn-sm btn-icon">
                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                </a>-->
                                <!--<a href="#" class="btn btn-danger btn-sm btn-icon" onclick="if(confirm('Voulez-vous vraiment supprimer cette année académique?')) { document.getElementById('form-{{ $annee->id }}').submit(); }">
                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                </a>-->

<!--<form action="{{ route('anneedelete', ['id' => $annee->id]) }}" method="post" id="form-{{ $annee->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>-->
                            </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
             </div>
         </div>
     </div>
  </div>
@endsection
