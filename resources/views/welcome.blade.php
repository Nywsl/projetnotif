@extends('layouts.template', [
    'namePage' => 'Accueil',
    'class' => 'login-page sidebar-mini',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets/img/bg14.jpg'),
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
          <div class="container">
            <div class="header-body text-center mb-7">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">
                  <form method="POST" action="{{ route('panierpagematricule') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="matricule" style="color: white">Matricule</label>
                      <input type="text" name="matricule" id="matricule" placeholder="Entrer un matricule" class="form-control" required>
                    </div>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                      <button type="submit" class="btn btn-success btn-sm">Valider</button>
                    </div>
                  </form>
                  @if (!$errors->has('matricule'))
                    <div class="mt-3">
                      <a href="{{ route('etudiantmodalite', 'id') }}">Je n'ai pas de matricule</a>
                      <p class="text-muted" style="color: white !important">Si vous n'avez pas de matricule, veuillez ajouter un identifiant ici.</p>
                    </div>
                  @endif
                  @include('alerts.migrations_check')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ml-auto mr-auto">
        <!-- You can add additional content here if needed -->
      </div>
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
