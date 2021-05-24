@extends('layouts.app', ['activePage' => 'conventions'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-danger button" href="{{ route('backend.convention.create') }}">
                <span class="text-white">New convention</span>
            </a>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-danger">
                    <h4 class="card-title">Conventions</h4>
                    <p class="card-category">List of conventions</p>
                    </div>
                    <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>City</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Speciality</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($conventions as $conv)
                            <tr>
                            <td>{{ $conv->id }}</td>
                             <td>
                                @if($conv->image)
                                    <img src="{{ asset('app/' . $conv->image) }}" width="100">
                                @else
                                    --
                                @endif
                            </td>
                            <td>{{ $conv->name }}</td>
                            <td>{{ $conv->type->name }}</td>
                            <td>{{ $conv->city }}</td>
                            <td>{{ $conv->desc }}</td>
                            <td>{{ $conv->address }}</td>
                            <td>{{ $conv->type->id === 3 ? $conv->spec : '--' }}</td>
                            <td>{{ $conv->created_at->format('d/m/Y H:m') }}</td>
                            <td>
                                <a type="button" rel="tooltip" class="btn btn-info text-white" href="{{route('backend.convention.edit', $conv->id)}}">
                                    <i class="material-icons">edit</i>
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