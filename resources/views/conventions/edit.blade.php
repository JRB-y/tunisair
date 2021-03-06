@extends('layouts.app', ['activePage' => 'conventions'])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">New convention</h4>
                <p class="card-category">You can create a convention</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="/conventions/edit/{{$convention->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('app/' . $convention->image) }}" width="100">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image" />
                                            </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Convention type</label>
                            <select name="type_id" class="form-control" id="select_type" onchange="typeChanged()">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ $type->id === $convention->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Name</label>
                            <input type="text" class="form-control"  aria-describedby="titleHelper" name="name" value="{{$convention->name}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">City</label>
                            <input type="text" class="form-control"  aria-describedby="titleHelper" name="city" value="{{$convention->city}}">
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Address</label>
                            <input type="text" class="form-control"  aria-describedby="titleHelper" name="address" value="{{$convention->address}}">
                        </div>
                        <div class="form-group">
                            <label for="contentActu">Description</label>
                            <textarea class="form-control" id="contentActu" rows="3" name="desc">{{ $convention->desc }}</textarea>
                        </div>
                        <div class="form-group" id="speciality">
                            <label for="contentActu">Speciality valide only for doctors</label>
                            <input type="text"class="form-control"  aria-describedby="titleHelper" name="spec" value="{{ $convention->spec }}">
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

@push('js')
    <script>
        function checkType () {
            const select = document.getElementById('select_type')
            const selectedOption = select.selectedOptions[0].value
            const sepciality = document.getElementById('speciality')

            if (selectedOption === '3') {
                sepciality.style.display = 'block'
            } else {
                sepciality.style.display = 'none'
            }
        }

        function typeChanged () {
            checkType()
        }

        checkType()

    </script>
@endpush