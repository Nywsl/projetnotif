@extends('layouts.app', [
    'namePage' => 'Ajout des Classes',
    'class' => 'sidebar-mini',
    'activePage' => 'Ajout des Classes',
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
        <h2 class="title">Ajout de Classe</h2>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouter une Classe</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('anneeclasseajout') }}" method="POST" class="container mt-0">
                        @csrf
                        <div class="mb-3">
                            <label for="libelle" class="form-label">Libellé</label>
                            <input type="text" id="libelle" name="libelle" class="form-control" required>
                            @error('libelle')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="niveau_id" class="form-label">Niveau</label>
                            <select id="niveau_id" name="niveau_id" class="form-select" required>
                                <option value="">Sélectionner un niveau</option>
                                @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                                @endforeach
                            </select>
                            @error('niveau_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('listesclasses') }}" class="btn btn-danger btn-sm">Annuler</a>
                            <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
