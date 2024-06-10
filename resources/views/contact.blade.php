@extends('layouts.app', [
    'namePage' => 'Contact',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'contact',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
          <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
              <div class="container">
                  <div class="header-body mb-7">
                      <div class="row justify-content-center">
                          <div class="col-lg-12 col-md-9">
                             <form action="{{ route('contact') }}" method="POST"  style="background-color: white; padding: 20px; border-radius: 10px;">
                                @csrf
                                <h5>Contact</h5>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                                </div>
                                <div class="form-group">
                                    <label for="sujet">Sujet</label>
                                    <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Entrez un sujet" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control rounded-3" id="message" name="message" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Valider</button>
                             </form>
                              <p class="text-lead text-light mt-3 mb-0">
                                  @include('alerts.migrations_check')
                              </p>
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
