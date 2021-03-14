@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ asset('app/' . $actualite->image) }}" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{ $actualite->title }}</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6 text-right">
            Par {{ $actualite->user->firstname }} {{ $actualite->user->lastname }}
        </div>
        <div class="col-6">
            Le {{ $actualite->created_at->format('d/m/Y H:i') }}
        </div>
    </div>

    <div class="row">
        <p class="text-center">
            {{ $actualite->content }}
        </p>
    </div>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('frontend') }}" class="btn">Back</a>
        </div>
    </div>

@endsection
