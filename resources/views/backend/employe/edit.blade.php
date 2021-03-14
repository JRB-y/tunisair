@extends('layouts.app', ['activePage' => 'employe', 'titlePage' => __('Nouveau employé')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Edit {{ $user->firstname }} {{ $user->lastname }}</h4>
                    <p class="card-category">You can edit this employee</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="{{ route('backend.employes.edit', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titleActu">Firstname</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="firstname" value="{{ $user->firstname}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Lastname</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="lastname" value="{{ $user->lastname}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Phone</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="phone" value="{{ $user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Email</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="email" value="{{ $user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Password</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
