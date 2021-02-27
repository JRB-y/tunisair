@extends('layouts.app', ['activePage' => 'employe', 'titlePage' => __('Employés')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <a class="btn btn-danger button" href="/employes/create">
            <span class="text-white">Nouveau Employé</span>
        </a>
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">Employés</h4>
                <p class="card-category">Liste des employés</p>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date création</th>
                    <th>Actif</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:m') }}</td>
                        <td>
                            <i class="fa fa-circle" style="color: {{ $user->active ? 'green' : 'red' }};"></i>
                        </td>
                        <td>
                            <a type="button" rel="tooltip" class="btn btn-info text-white" href="/employes/edit/{{$user->id}}">
                                <i class="material-icons">edit</i>
                            </a>
                            <a type="button" rel="tooltip" class="btn text-white {{ $user->active ? 'btn-danger' : 'btn-success' }}" href="/employes/active/{{ $user->id }}">
                                <i class="material-icons">{{ $user->active ? 'close' : 'check' }}</i>
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
