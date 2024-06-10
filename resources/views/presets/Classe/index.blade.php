@extends('layouts.app', ['page' => __('presets.classe.index'), 'pageSlug' => 'presets.classe.index'])

@section('content')
<div class="card">
    <div class="card-body">
      <form method="post"  action="{{route('Ajoutclasse')}}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Libelle</label>
          <input  class="form-control" id="libelle" aria-describedby="emailHelp" placeholder="libelle" name="libelle">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">description</label>
          <input  class="form-control" id="description" placeholder="description" name="description">
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="">
                Option one is this
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

@endsection
