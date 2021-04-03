@extends('layouts.app', ['activePage' => 'banner'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-danger button" href="{{ route('backend.banner.create') }}">
                <span class="text-white">New Banner</span>
            </a>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-danger">
                    <h4 class="card-title">Banners</h4>
                    <p class="card-category">List of banner</p>
                    </div>
                    <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($banners as $ban)
                            <tr>
                            <td>{{ $ban->id }}</td>
                            <td>
                                <img src="{{ asset('app/' . $ban->image) }}" width="100">
                            </td>
                            <td>{{ $ban->title }}</td>
                            <td>{{ $ban->text }}</td>
                            <td>{{ $ban->created_at->format('d/m/Y H:m') }}</td>
                            <td>
                                <a type="button" rel="tooltip" class="btn btn-info text-white" href="{{route('backend.banner.edit', $ban->id)}}">
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