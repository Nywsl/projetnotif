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
                                <th scope="col">Date de fin</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anneesAcademiques as $annee)
                            <tr>
                               <td>{{ $annee->Annee_Academique }}</td>
                               <td>{{ $annee->date_debut }}</td>
                               <td>{{ $annee->date_fin }}</td>
                               <td>{{ $annee->actif ? 'En cours' : 'Non en cours' }}</td>
                               <td>{{ $annee->description }}</td>
                            </tr>
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

<form action="{{ route('ajoutAnnee') }}" method="POST" class="container mt-0">
    @csrf
    <div class="p-2">
        <label for="Annee_Academique" class="form-label">Année académique</label>
        <input type="text" id="Annee_Academique" name="Annee_Academique" class="form-control mt-1" required>
        @error('Annee_Academique')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="p-2">
        <label for="Annee_Actuelle" class="form-label">Année actuelle</label>
        <input type="date" id="Annee_Actuelle" name="Annee_Actuelle" class="form-control mt-1" required>
        @error('Annee_Actuelle')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="p-2">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control mt-1" required></textarea>
        @error('description')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="p-2 d-flex justify-content-between align-items-center">
        <a href="{{ route('pageannee') }}" class="btn btn-danger btn-sm">Annuler</a>
        <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
    </div>
</form>
</div>
</div>
