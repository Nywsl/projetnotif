@extends('layouts.app', ['page' => __('presets.niveau.index'), 'pageSlug' => 'presets.niveau.index'])

@section('content')
<div class="col-md-12">
    <div class="card">
    <form action="post" class="container mt-0">
        <div class="p-2">
            <label for="niveau" class="form-label">Ajout de niveau</label>
            <input type="text" id="niveau" class="form-control mt-1">
        </div>
        <div class="p-2 d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-danger btn-sm">Annuler</button>
            <button type="button" class="btn btn-success btn-sm">Ajouter</button>
        </div>
    </form>
    @endsection
