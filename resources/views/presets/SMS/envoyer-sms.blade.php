@extends('layouts.app', [
    'namePage' => 'envoyer-sms',
    'class' => 'sidebar-mini',
    'activePage' => 'envoyer-sms',
])

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Envoi de SMS</h2>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="jumbotron">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Send SMS message
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('envoyer.messages.personnalises') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Select users to notify</label>
                                    <select  name="etudiants[]" multiple class="form-control">
                                        @foreach ($etudiants as $etudiant)
                                            <option value="{{ $etudiant->id }}">{{ $etudiant->contact }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="schedule" class="form-label">Planifier l'envoi :</label>
                                    <input type="datetime-local" class="form-control" id="schedule" name="schedule">
                                </div>
                                <div class="form-group">
                                    <label>Notification Message</label>
                                    <textarea class="form-control" rows="3" name="message"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="sender" class="form-label">Expéditeur :</label>
                                    <input type="text" class="form-control" id="sender" name="sender" placeholder="Votre nom ou numéro">
                                </div>
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Effacer le message de succès après 5 secondes
        setTimeout(function(){
            $('.alert-success').alert('close');
        }, 5000);
    </script>
@endsection

