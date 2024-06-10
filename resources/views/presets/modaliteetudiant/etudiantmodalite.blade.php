@extends('layouts.template', [
    'namePage' => 'etudiantmodalite',
    'class' => 'sidebar-mini',
    'activePage' => 'etudiantmodalite',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])


@section('content')
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-white">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                            <div class="form-group text-white">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>
                        <div class="form-group text-white">
                                <label for="classe_id">Classe</label>
                             <select name="classe_id" id="classe_id" class="form-control" required>
                                <option value="" >Sélectionner une classe</option>
                                 @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach

                            </select>
                        </div>
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger btn-sm">Annuler</button>
                                <button type="submit" class="btn btn-success btn-sm">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
