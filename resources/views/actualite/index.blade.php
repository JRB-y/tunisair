@extends('layouts.app', ['activePage' => 'actualite', 'titlePage' => __('Actualité')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <a class="btn btn-danger button" href="/actualite/create">
            <span class="text-white">Nouvelle Actualité</span>
        </a>
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">Actualités</h4>
                <p class="card-category">Liste des actualités</p>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Utilisateur</th>
                    <th>Date création</th>
                    <th>Active</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach ($actualites as $act)
                        <tr>
                        <td>{{ $act->id }}</td>
                        <td>
                            <img src="{{ asset('app/' . $act->image) }}" width="100">
                        </td>
                        <td>{{ $act->title }}</td>
                        <td>{{ $act->content }}</td>
                        <td>{{ $act->user->firstname . ' ' . $act->user->lastname }}</td>
                        <td>{{ $act->created_at->format('d/m/Y H:m') }}</td>
                        <td>
                            <i class="fa fa-circle" style="color: {{ $act->active ? 'green' : 'red' }};"></i>
                        </td>
                        <td>
                            <a type="button" rel="tooltip" class="btn btn-info text-white" href="/actualite/edit/{{$act->id}}">
                                <i class="material-icons">edit</i>
                            </a>
                            <a type="button" rel="tooltip" class="btn text-white {{ $act->active ? 'btn-danger' : 'btn-success' }}" href="/actualite/active/{{ $act->id }}">
                                <i class="material-icons">{{ $act->active ? 'close' : 'check' }}</i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
