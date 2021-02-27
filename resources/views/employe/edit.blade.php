@extends('layouts.app', ['activePage' => 'employe', 'titlePage' => __('Nouveau employé')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">Nouveau employé</h4>
                <p class="card-category">Vous pouvez crée un nouveau employé</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="/employes/edit/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titleActu">Nom</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="firstname" value="{{ $user->firstname}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Prénom</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="lastname" value="{{ $user->lastname}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Téléphone</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="phone" value="{{ $user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Email</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="email" value="{{ $user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Mot de passe</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
