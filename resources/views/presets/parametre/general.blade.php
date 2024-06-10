@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Paramètres généraux',
    'activePage' => 'parametres.general',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Paramètres généraux")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('parametres.general.update') }}">
              @csrf
              <div class="form-group">
                <label>{{__("Nom du site")}}</label>
                <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name']) }}">
              </div>
              <div class="form-group">
                <label>{{__("Description du site")}}</label>

              </div>
              <div class="form-group">
                <label>{{__("Langue par défaut")}}</label>
                <select name="default_language" class="form-control">
                  <option value="en"   ) selected >Anglais</option>
                  <option value="fr" ) selected>Français</option>
                  <!-- Ajoutez d'autres langues au besoin -->
                </select>
              </div>
              <div class="form-group">
                <label>{{__("Fuseau horaire")}}</label>
                <select name="timezone" class="form-control">
                  
                </select>
              </div>
              <!-- Ajoutez d'autres champs ici -->
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary btn-round">{{__('Enregistrer')}}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
