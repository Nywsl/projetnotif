@extends('layouts.app', [
    'namePage' => 'matricule_paiement',
    'class' => 'sidebar-mini',
    'activePage' => 'matricule_paiement',
])

@section('content')
@foreach ($errors->all() as $error)
<div class="alert alert-danger">{{ $error }}</div>
@endforeach

@if (session()->has('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title"></h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('matpagepaiement') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Matricule</label>
                                <input type="text" name="matricule" id="matricule" placeholder="Entrer un matricule" class="form-control" required>

                            </div>
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger btn-sm">Annuler</button>
                                <button type="submit" class="btn btn-success btn-sm">Valider</button>
                            </div>
                        </form>
                        @if (!$errors->has('matricule'))
                        <div class="mt-3">
                            <a href="{{ route('etudiantpaiement','id') }}">je n'ai pas de matricule</a>
                            <p class="text-muted">Si vous n'avez pas de matricule, veuillez ajouter un identifiant ici.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
