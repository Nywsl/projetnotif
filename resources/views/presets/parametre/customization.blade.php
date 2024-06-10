@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Paramètres de personnalisation',
    'activePage' => 'parametres.customization',
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
            <h5 class="title">{{__("Paramètres de personnalisation")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('parametres.customization.update') }}">
              @csrf
              <div class="form-group">
                <label for="primary_color">{{__("Couleur primaire")}}</label>
                <input type="color" name="primary_color" id="primary_color" class="form-control" value="{{ old('primary_color', $settings['primary_color']) }}">
              </div>
              <div class="form-group">
                <label for="secondary_color">{{__("Couleur secondaire")}}</label>
                <input type="color" name="secondary_color" id="secondary_color" class="form-control" value="{{ old('secondary_color', $settings['secondary_color']) }}">
              </div>
              <div class="form-group">
                <label for="font_size">{{__("Taille de police")}}</label>
                <input type="number" name="font_size" id="font_size" class="form-control" value="{{ old('font_size', $settings['font_size']) }}" min="10" max="30">
              </div>
              <button type="submit" class="btn btn-primary">{{__('Enregistrer')}}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script>
     document.addEventListener('DOMContentLoaded', function() {
    // Récupère les éléments input de type color
    let colorInputs = document.querySelectorAll('input[type="color"]');

    // Fonction pour mettre à jour la valeur des champs de couleur
    function updateColor(event) {
      let color = event.target.value;
      event.target.nextElementSibling.style.backgroundColor = color; // Change la couleur de fond du conteneur voisin pour afficher la couleur sélectionnée
    }

    // Ajoute un écouteur d'événements à chaque champ de couleur
    colorInputs.forEach(input => {
      input.addEventListener('change', updateColor);
      // Déclenche l'événement change pour mettre à jour la couleur affichée initialement
      input.dispatchEvent(new Event('change'));
    });
  });
  </script>
@endpush
