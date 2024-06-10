<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        {{ __('CT') }}
      </a>
      <a href="#" class="simple-text logo-normal">
        {{ __('School') }}
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="@if ($activePage == 'home') active @endif">
          <a href="{{ route('home') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Dashboard') }}</p>
          </a>
        </li>
        <!--<li>
            <a data-toggle="collapse" href="#profile">
                <i class="now-ui-icons users_circle-08"></i>
              <p>
                {{ __("profile") }}
                <b class="caret"></b>
              </p>
            </a>
          <div class="collapse show" id="profile">
            <ul class="nav">
              <li class="@if ($activePage == 'profile') active @endif">
                <a href="{{ route('profile.edit') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p> {{ __("User Profile") }} </p>
                </a>
              </li>
            </ul>
          </div>
        </li>-->

        <li class = " @if ($activePage == 'listeAnnee') active @endif">
          <a href="{{ route('listeAnnee','liste des Années') }}">
            <i class="now-ui-icons objects_globe"></i>
            <p>{{ __('Annee Academique') }}</p>
          </a>
        </li>
        <li>
            <li class = " @if ($activePage == 'listeniveaux') active @endif">
                <a href="{{ route('listeniveaux','liste des Niveaux') }}">
                  <i class="now-ui-icons ui-1_bell-53"></i>
                  <p>{{ __('NIVEAU') }}</p>
                </a>
        </li>
        <li>
            <a data-toggle="collapse" href="#Etudiant">
                <i class="now-ui-icons users_circle-08"></i>
              <p>
                {{ __("Etudiant") }}
                <b class="caret"></b>
              </p>
            </a>
          <div class="collapse show" id="Etudiant">
            <ul class="nav">
            <li class = " @if ($activePage == 'Liste des Étudiants') active @endif">
                <a href="{{ route('listedesetudiants','liste des etudiants') }}">
                    <i class="now-ui-icons education_hat"></i>
                  <p>{{ __('Liste des Etudiants') }}</p>
                </a>
            </li>

            <li class = " @if ($activePage == 'Liste des Étudiants proche de paiement') active @endif">
                <a href="{{ route('modaliteenproche','Liste des Étudiants proche de paiement') }}">
                    <i class="now-ui-icons education_hat"></i>
                  <p>{{ __('Etudiants proche d\'echeance') }}</p>
                </a>
            </li>
            <li class = " @if ($activePage == 'Liste des Étudiants en retard de paiement') active @endif">
                <a href="{{ route('modaliteenretard','Liste des Étudiants en retard de paiement') }}">
                    <i class="now-ui-icons education_hat"></i>
                  <p>{{ __('Etudiants en retard') }}</p>
                </a>
            </li>
         </ul>
          </div>
        </li>
        <li>
            <a data-toggle="collapse" href="#modalite">
                <i class="now-ui-icons business_money-coins"></i>
              <p>
                {{ __("Paiement modalite") }}
                <b class="caret"></b>
              </p>
            </a>
          <div class="collapse show" id="modalite">
            <ul class="nav">

            <li class = " @if ($activePage == 'matricule_modalite') active @endif">
                <a href="{{ route('matriculemodalite','matricule_modalite') }}">
                    <i class="now-ui-icons users_single-02"></i>
                  <p>{{ __('Ajout de matricule') }}</p>
                </a>
            </li>
            <li class = " @if ($activePage == 'etudiantmodalite') active @endif">
                <a href="{{ route('etudiantmodalite','etudiantmodalite') }}">
                    <i class="now-ui-icons users_single-02"></i>
                  <p>{{ __('Ajout d\'identifiant') }}</p>
                </a>
            </li>
            <li class = " @if ($activePage == 'Ajout des Modalités Étudiants') active @endif">
                <a href="{{ route('listemodaliteetudiant','Ajout des Modalités Étudiants') }}">
                    <i class="now-ui-icons users_single-02"></i>
                  <p>{{ __('ajoutmodaliteetudiant') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'Ajout des Modalités Étudiants') active @endif">
                <a href="{{ route('ajoutmodaliteetudiant') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>{{ __('ajoutmodaliteetudiant') }}</p>
                </a>
            </li>

            </ul>
          </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#SMS">
                <i class="now-ui-icons ui-2_chat-round"></i>
              <p>
                {{ __("SMS") }}
                <b class="caret"></b>
              </p>
            </a>
          <div class="collapse show" id="SMS">
            <ul class="nav">
            <li class = " @if ($activePage == 'envoyer-sms') active @endif">
                <a href="{{ route('envoyer-sms','envoyer-sms') }}">
                    <i class="now-ui-icons ui-1_send"></i>
                  <p>{{ __('creer un SMS') }}</p>
                </a>
            </li>
            <li class = " @if ($activePage == 'liste-sms-envoyes') active @endif">
                <a href="{{ route('envoyer-sms-form','liste-sms-envoyes') }}">
                    <i class="now-ui-icons ui-2_chat-round"></i>
                  <p>{{ __('Liste des SMS') }}</p>
                </a>
            </li>
            </ul>
          </div>
        </li>
        <!--<li class="@if ($activePage == 'parametres') active @endif">
            <a href="{{ route('parametres.index') }}">
                <i class="now-ui-icons loader_gear"></i>
              <p> {{ __("paramètres") }} </p>
            </a>
          </li>
        <li>-->
            <li>
                <a data-toggle="collapse" href="#parametres">
                    <i class="now-ui-icons loader_gear"></i>
                    <p>{{ __("Paramètres") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="parametres">
                    <ul class="nav">
                        <li class="@if ($activePage == 'parametres.general.index') active @endif">
                            <a href="{{ route('parametres.general.index') }}">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p>{{ __('Général') }}</p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'parametres.customization.index') active @endif">
                            <a href="{{ route('parametres.customization.index') }}">
                                <i class="now-ui-icons design_palette"></i>
                                <p>{{ __('Personnalisation') }}</p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'parametres.profile.index') active @endif">
                            <a href="{{ route('parametres.profile.index') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>{{ __('Profil') }}</p>
                            </a>
                        </li>
                    </ul>
            </div>

      </ul>
    </div>
  </div>
