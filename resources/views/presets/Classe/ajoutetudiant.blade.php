@extends('layouts.app', [
    'namePage' => 'Ajout des étudiants',
    'class' => 'sidebar-mini',
    'activePage' => 'Ajout des étudiants',
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
            <h2 class="title">Ajout des Étudiants</h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter un étudiant</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('classeajoutetudiant', $id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="matricule">Matricule</label>
                                <input type="text" name="matricule" id="matricule" class="form-control" required>
                            </div>


                            
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger btn-sm">Annuler</button>
                                <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
