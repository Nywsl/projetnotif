@extends('layouts.app', [
  'namePage' => 'envoyer-sms',
  'class' => 'sidebar-mini',
  'activePage' => 'envoyer-sms',
])

@section('content')


@foreach($errors->all() as $error)
    {{ $error }}
@endforeach


@if (@session()->has('success'))
    <div class="alert alert-success">{{(session('success'))}}</div>
@endif
<div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Envoi sms</h2>
    </div>
  </div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Envoi_sms</h4>
                </div>
                <div class="card-body">
                    <!-- resources/views/inscription.blade.php -->

<form action="{{ route('envoyer-sms') }}" method="post">
    @csrf
    <label for="nom">Nom de l'étudiant:</label>
    <input type="text" id="nom" name="nom" required>
    <label for="contact">Contact de l'étudiant:</label>
    <input type="text" id="contact" name="contact" required>
    <button type="submit">Inscrire et Envoyer SMS</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
