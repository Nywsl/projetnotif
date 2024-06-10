@extends('layouts.app', [
  'namePage' => 'Ajout de modalités de niveaux',
  'class' => 'sidebar-mini',
  'activePage' => 'Ajout de modalités de niveaux',
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
        <h2 class="title">Ajout de Modalité de niveaux</h2>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouter une modalite</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('niveauajoutmodalite', $id) }}" method="POST" class="container mt-0">
                        @csrf
                        <div class="mb-3">
                            <label for="echeance" class="form-label">Echéance</label>
                            <input type="date" id="echeance" name="echeance" class="form-control" required>
                            @error('echeance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="montant" class="form-label">Montant</label>
                            <input type="number" id="montant" name="montant" class="form-control" required>
                            @error('montant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('niveaulistemodalite', $id) }}" class="btn btn-danger btn-sm">Annuler</a>
                            <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
