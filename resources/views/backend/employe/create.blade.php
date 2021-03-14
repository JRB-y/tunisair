@extends('layouts.app', ['activePage' => 'employe', 'titlePage' => __('New employee')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">New Employee</h4>
                <p class="card-category">You can create a new employee</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="{{ route('backend.employes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titleActu">Firstname</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="firstname" required value="{{ old('firstname') }}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Lastname</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="lastname" required value="{{ old('lastname') }}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Phone</label>
                            <input type="number" class="form-control" id="titleActu" aria-describedby="titleHelper" name="phone" required value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Email</label>
                            <input type="email" class="form-control" id="titleActu" aria-describedby="titleHelper" name="email" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Password</label>
                            <input type="password" class="form-control" id="titleActu" aria-describedby="titleHelper" name="password" required>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="active">
                                Active employee
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
