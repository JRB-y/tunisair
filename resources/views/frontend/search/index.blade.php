@extends('layouts.frontend')

@section('content')
    <form action="{{ route('frontend.search') }}" method="POST">
        @csrf

        @if ($search === 'convention')
            <div class="row mt-5">
                <div class="col-8">
                    <div class="form-group">
                        <label for="search_query">Search by name or description</label>
                        <input type="text" class="form-control" id="search_query" name="search_query" autofocus placeholder="Searching for {{ $type->name }}s ..." >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="city">Search by city</label>
                        <input type="text" class="form-control" id="city" name="search_adrs" autofocus placeholder="Searching for {{ $type->name }}s in...">
                    </div>
                </div>
            </div>
    
            @if ($type->id === 3)
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="specialite">Speciality</label>
                            <input type="text" class="form-control" id="specialite" name="doctor_speciality" autofocus required placeholder="Doctor's specitality">
                        </div>
                    </div>
                </div>
            @endif
    
            <div class="row">
                <div class="col-12 text-right">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>

            @else
                <h3>Search type dosen't exits</h3>
            @endif

            <input type="hidden" name="search" value="{{ $search }}">
            <input type="hidden" name="type_id" value="{{ $type->id }}">
    </form>


    @if (Session::has('results'))
        @php
            $results = Session::get('results')
        @endphp

        <div class="row">
            @foreach ($results as $rsl)
                <div class="col-12">
                    <div class="d-flex text-muted pt-3">
                        <img src="{{ asset('app/' . $rsl->image) }}" width="112" height="112" class="mr-2">

                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">
                                {{ $rsl->name }}
                                <small>
                                    {{ $rsl->address . ' ' . $rsl->city }}
                                </small>
                            </strong>
                            {{ $rsl->desc }}
                            <a href="{{ route('frontend.convention.show', $rsl->id) }}" class="tun-red--text">Lire la suite</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

