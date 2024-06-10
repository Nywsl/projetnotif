@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => '',
    'activePage' => 'parametres',
    'activeNav' => '',
])
@section('content')
<div class="container">
    <h1>Paramètres</h1>
    <form action="{{ route('parametres.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sidebar_color">Couleur de la barre latérale</label>
            <select name="sidebar_color" id="sidebar_color" class="form-control">
                <option value="blue" @if ($settings['sidebar_color'] == 'blue') selected @endif>Bleu</option>
                <option value="green" @if ($settings['sidebar_color'] == 'green') selected @endif>Vert</option>
                <option value="orange" @if ($settings['sidebar_color'] == 'orange') selected @endif>Orange</option>
                <option value="red" @if ($settings['sidebar_color'] == 'red') selected @endif>Rouge</option>
                <option value="yellow" @if ($settings['sidebar_color'] == 'yellow') selected @endif>Jaune</option>
            </select>
        </div>

        <!-- Nouveau paramètre: Taille de la police -->
        <div class="form-group">
            <label for="font_size">Taille de la police</label>
            <input type="number" name="font_size" id="font_size" class="form-control" value="{{ $settings['font_size'] ?? 14 }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const settingsForm = document.getElementById('settingsForm');

        settingsForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(settingsForm);
            fetch('{{ route("parametres.update") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la sauvegarde des paramètres');
                }
                return response.json();
            })
            .then(data => {
                alert('Paramètres enregistrés avec succès');
            })
            .catch(error => {
                alert(error.message);
            });
        });
    });
</script>
