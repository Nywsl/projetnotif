@extends('layouts.app', [
  'namePage' => 'Ajout des années académiques',
  'class' => 'sidebar-mini',
  'activePage' => 'Ajout des années académiques',
])

@section('content')

@foreach($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
@endforeach

@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="panel-header">
    <div class="header text-center">
        <h2 class="title">ANNÉE ACADÉMIQUE</h2>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouter une Année Académique</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ajoutAnnee') }}" method="POST" class="container mt-0">
                        @csrf
                        <div class="mb-3">
                            <label for="debut" class="form-label">Debut</label>
                            <input type="number" id="debut" name="debut" class="form-control" required>
                            @error('debut')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fin" class="form-label">Fin</label>
                            <input type="number" id="fin" name="fin" class="form-control" required>
                            @error('fin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="date_debut" class="form-label">Date de début</label>
                            <input type="date" id="date_debut" name="date_debut" class="form-control" required>
                            @error('date_debut')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('pageannee') }}" class="btn btn-danger btn-sm">Annuler</a>
                            <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
