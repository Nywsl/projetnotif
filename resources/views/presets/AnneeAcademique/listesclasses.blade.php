@extends('layouts.app', [
    'namePage' => 'Liste des Classes',
    'class' => 'sidebar-mini',
    'activePage' => 'liste des Classes',
])

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Liste des classes</h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('anneepageclasse', $id) }}">Ajouter une Classe</a>
                    <h4 class="card-title">Liste des Classes</h4>
                    <div class="col-12 mt-2">
                    </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="disabled-sorting text-right"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($classes as $classe)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $classe->libelle }}</td>
                                <td>{{ $classe->description }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('anneeeditclasse', ['id' => $classe->id]) }}"
                                        class="btn btn-success btn-sm btn-icon">
                                        <i class="now-ui-icons ui-2_settings-90"></i></a>


                                    <a href="#" class="btn btn-danger btn-sm btn-icon"
                                        onclick="if(confirm('voulez vous vraiment supprimer ce niveau?')){
                        document.getElementById('form-{{ $classe->id }}').submit()
                    ;}">
                                        <i class="now-ui-icons ui-1_simple-remove"></i></a>

                                        <a href="{{ route('classelisteetudiants', $classe->id) }}"
                                            class="btn btn-info btn-sm btn-icon">
                                            <i class="now-ui-icons design_app"></i></a>

                                    <form action="{{ route('anneedeleteclasse', ['id' => $classe->id]) }}"
                                        method="post" id="form-{{ $classe->id }}">
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
