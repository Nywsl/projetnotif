@extends('layouts.app', [
    'namePage' => '',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'inscription',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
          <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
              <div class="container">
                  <div class="header-body  mb-7">
                      <div class="row justify-content-center">
                          <div class="col-lg-12 col-md-9">
                            <h2 style="text-align: center; margin-bottom: 20px; color: white">Formulaire d'Inscription Scolaire</h2>
                            <form action="{{ route('inscription') }}" method="POST"  style="background-color: white; padding: 20px; border-radius: 10px;">
                                @csrf
                                <h5>formulaire d'inscription</h5>
                                <div class="form-group " >
                                    <label for="nom">Nom :</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="entrez votre nom" required>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prénom :</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="entrez votre prénom" required>
                                </div>

                                <div class="form-group">
                                    <label for="matricule">Matricule :</label>
                                    <input type="text" class="form-control" id="matricule" name="matricule" placeholder="entrez votre matricule" required>
                                </div>

                                <div class="form-group">
                                    <label for="numero">Numero telephone :</label>
                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="entrez un numero valide" required>
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact parents :</label>
                                    <input type="type" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <div class="form-group">
                                    <label for="classe">classe</label>
                               <input type="text" class="form-control" id="classe" name="classe" placeholder="entrer votre classe precedente" required >
                                </div>
                                <div class="form-group">
                                    <label for="classe">Niveau :</label>
                                    <select class="form-control" id="classe" name="classe" required>
                                        <option value="">Sélectionner le niveau</option>
                                        <option value="1ère année">1ère année</option>
                                        <option value="2ème année">2ème année</option>
                                        <option value="3ème année">3ème année</option>
                                        <option value="4ème année">4ème année</option>

                                    </select>
                                </div>
                               
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </form>


                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 ml-auto mr-auto">
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
