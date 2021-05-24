@extends('layouts.app', ['activePage' => 'ticket-requests', 'titlePage' => __('Ticket Requests')])

@section('content')

<div class="content">
    <div class="container-fluid">
        {{-- <a class="btn btn-danger button" href="{{ route('backend.employes.create') }}">
            <span class="text-white">New Employee</span>
        </a> --}}
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">All Ticket Requests</h4>
                    <p class="card-category">List of requests</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>User quota</th>
                        <th>Vol ID</th>
                        <th>Num vol</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user->firstname }}</td>
                                <td>{{ $request->user->lastname }}</td>
                                <td>{{ $request->quota_user_when_request }}</td>
                                <td>{{ $request->vol->id }}</td>
                                <td>{{ $request->vol->num_vol }}</td>
                                <td>
                                    <span class="badge
                                        @if($request->status === 'pending')
                                        badge-warning
                                        @elseif ($request->status === 'declined')
                                        badge-danger
                                        @elseif ($request->status === 'approved')
                                        badge-success
                                        @endif
                                    ">
                                        {{ $request->status}}
                                    </span>
                                </td>
                                <td>{{ $request->created_at->format('d/m/Y H:m') }}</td>
                                <td>
                                    <a type="button" rel="tooltip" class="btn btn-info text-white" href="{{route('backend.ticket-requests.approve', $request->id)}}">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a type="button" rel="tooltip" class="btn btn-danger text-white" href="{{route('backend.ticket-requests.decline', $request->id)}}">
                                        <i class="material-icons">error</i>
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
