@extends('layouts.app', [
  'namePage' => 'Ajout des Modalités Étudiants',
  'class' => 'sidebar-mini',
  'activePage' => 'Ajout des Modalités Étudiants',
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
        <h2 class="title">Ajout de Modalité Étudiant</h2>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouter une modalité étudiant</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ajoutmodaliteetudiant') }}" method="POST" class="container mt-0">
                        @csrf
                        <div class="mb-3">
                            <label for="echeance" class="form-label">Echéance</label>
                            <input type="text" id="echeance" name="echeance" class="form-control" required>
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

                        <div class="mb-3">
                            <label for="sms_envoye" class="form-label">SMS Envoyé</label>
                            <select name="sms_envoye" id="sms_envoye" class="form-control" required>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                            @error('sms_envoye')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="date_sms" class="form-label">Date du SMS</label>
                            <input type="text" id="date_sms" name="date_sms" class="form-control" required>
                            @error('date_sms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="etat" class="form-label">Etat</label>
                            <select name="etat" id="etat" class="form-control" required>
                                <option value="en_cours">En cours</option>
                                <option value="annule">Annulé</option>
                            </select>
                            @error('etat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="etudiant_id" class="form-label">Etudiant</label>
                            <select name="etudiant_id" id="etudiant_id" class="form-control" required>
                                <option value="">Sélectionner un étudiant</option>
                                @foreach ($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}">{{ $etudiant->nom_complet }}</option>
                                @endforeach
                            </select>
                            @error('etudiant_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('listemodaliteetudiant') }}" class="btn btn-danger btn-sm">Annuler</a>
                            <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
