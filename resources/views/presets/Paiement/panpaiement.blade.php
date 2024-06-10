@extends('layouts.app', [
    'namePage' => 'panpaiement',
    'class' => 'sidebar-mini',
    'activePage' => 'panpaiement',
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
                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>
                            <!--<div class="form-group">
                                <label for="classe_id">Classe</label>
                                <select name="classe_id" id="classe_id" class="form-control" required>
                                    <option value="">Sélectionner une classe</option>

                                </select>
                            </div>-->
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger btn-sm">Annuler</button>
                                <button type="submit" class="btn btn-success btn-sm">payer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
