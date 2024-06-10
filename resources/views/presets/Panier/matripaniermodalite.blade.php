@extends('layouts.template', [
    'namePage' => 'Contact',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'matripaniermodalite',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
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
            <diV class="col-md-3" ></diV>
            <div class="col-md-6">
                <div class="">

                    <div class="">
                        <form method="POST" action="{{ route('panierpagematricule') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom" style="color: white">Matricule</label>
                                <input type="text" name="matricule" id="matricule" placeholder="Entrer un matricule" class="form-control" required>

                            </div>
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger btn-sm">Annuler</button>
                                <button type="submit" class="btn btn-success btn-sm">Valider</button>
                            </div>
                        </form>
                        @if (!$errors->has('matricule'))
                        <div class="mt-3">
                            <a href="{{ route('etudiantmodalite','id') }}">je n'ai pas de matricule</a>
                            <p class="text-muted" style="color: white !important" >Si vous n'avez pas de matricule, veuillez ajouter un identifiant ici.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3" ></div>
        </div>
    </div>
@endsection
@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
