@extends('layouts.app', [
    'namePage' => 'Liste des étudiants',
    'class' => 'sidebar-mini',
    'activePage' => 'liste des étudiants',
])

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Listes des Étudiants</h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('classepageetudiant',$id) }}">Ajouter un Étudiant</a>
                    <!-- Formulaire d'importation -->
                    <form action="{{ route('classeetudiantimport',$id) }}" method="POST" enctype="multipart/form-data" class="pull-right">
                        @csrf
                        <input type="file" name="fichier" class="btn btn-primary btn-round text-white pull-right" style="display: none;" id="fileInput" onchange="$('#upload-file-info').html($(this).val());">
                        <label for="fileInput" class="btn btn-primary btn-round text-white pull-right"><i class="now-ui-icons arrows-1_cloud-upload-94"></i>Importer</label>
                        <span class='label label-info' id="upload-file-info"></span>
                    </form>
                    <!-- Fin du formulaire d'importation -->
                    <a href="{{ route('classeetudiantexport', $id) }}" class="btn btn-primary btn-round text-white pull-right"><i class="now-ui-icons arrows-1_cloud-download-93"></i> Exporter</a>
                    <h4 class="card-title">Liste des Étudiants</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                    </div>
                    {{$id}}
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Date Naissance</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Matricule</th>
                               <!-- <th scope="col">Photo</th>-->
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etudiants as $etudiant)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $etudiant->nom }}</td>
                                    <td>{{ $etudiant->prenom }}</td>
                                    <td>{{ $etudiant->date_naissance }}</td>
                                    <td>{{ $etudiant->contact }}</td>
                                    <td>{{ $etudiant->matricule }}</td>
                                    <!--<td>{{ $etudiant->photo }}</td>-->

                                    <td class="td-actions text-right">
                                        <a href="{{route('classeeditetudiant',['id'=>$etudiant->id])}}" class="btn btn-success btn-sm btn-icon" >
                                            <i class="now-ui-icons ui-2_settings-90"></i></a>


                                            <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="if(confirm('voulez vous vraiment supprimer ce etudiant?')){
                                                document.getElementById('form-{{$etudiant->id}}').submit()
                                            ;}">
                                                <i class="now-ui-icons ui-1_simple-remove"></i></a>
                                                <form action="{{route('classedeleteetudiant',['id'=>$etudiant->id])}}" method="post" id="form-{{$etudiant->id}}">
                                                    <!--<input type="hiden" name="_method" value="delete">-->
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
