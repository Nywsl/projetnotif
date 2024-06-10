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
                            <h2 style="text-align: center; margin-bottom: 20px; color: white">Formulaire de preinscription Scolaire</h2>
                            <form action="{{ route('inscription') }}" method="POST"  style="background-color: white; padding: 20px; border-radius: 10px;">
                                @csrf
                                <h5>formulaire de preinscription</h5>
                                <div class="form-group " >
                                    <label for="nom">Nom :</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="entrez votre nom" required>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prénom :</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="entrez votre prénom" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_naissance">Date de naissance :</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" id="jour" name="jour" required>
                                                <option value="">Jour</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" id="mois" name="mois" required>
                                                <option value="">Mois</option>
                                                <option value="1">Janvier</option>
                                                <option value="2">Février</option>
                                                <option value="3">Mars</option>
                                                <option value="4">Avril</option>
                                                <option value="5">Mai</option>
                                                <option value="6">Juin</option>
                                                <option value="7">Juillet</option>
                                                <option value="8">Août</option>
                                                <option value="9">Septembre</option>
                                                <option value="10">Octobre</option>
                                                <option value="11">Novembre</option>
                                                <option value="12">Décembre</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" id="annee" name="annee" required>
                                                <option value="">Année</option>
                                                @for ($i = date("Y"); $i >= 1900; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lieu_naissance">lieu de naissance :</label>
                                    <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="numero">Numero telephone :</label>
                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="entrez un numero valide" required>
                                </div>

                                <div class="form-group">
                                    <label for="parent">Parents :</label>
                                    <div class="row">
                                        <div class="col">
                                    <input type="text" class="form-control" id="parent" name="parent" placeholder="nom parents" required>
                                        </div>
                                        <div class="col">
                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="numero parents" required>
                                        </div>
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
