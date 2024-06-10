@extends('layouts.app', ['page' => __('presets.paiement.pageajoutpaiement'), 'pageSlug' => 'presets.paiement.pageajoutpaiement'])

@section('content')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

@if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="col-md-12">
    <div class="card">
        <form method="POST" action="{{ route('ajoutpaiement') }}" class="container mt-0">
            @csrf
            <div class="p-2">
                <label for="montant" class="form-label">Montant</label>
                <input type="text" id="montant" class="form-control mt-1" placeholder="Entrer un montant" name="montant">
            </div>
            <div class="p-2">
                <label for="transaction" class="form-label">Transaction</label>
                <input type="text" id="transaction" class="form-control mt-1" placeholder="Faire une transaction" name="transaction">
            </div>
            <div class="p-2">
                <label for="etat" class="form-label">État</label>
                <input type="text" id="etat" class="form-control mt-1" name="etat">
            </div>
            <div class="p-2">
                <label for="observation" class="form-label">Observation</label>
                <input type="text" id="observation" class="form-control mt-1" name="observation">
            </div>
            <div class="p-2 d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-danger btn-sm">Annuler</button>
                <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            </div>
        </form>
    </div>
</div>

@endsection
