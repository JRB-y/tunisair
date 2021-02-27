@extends('layouts.employe')

@section('content')

    @foreach ($actualites as $act)
        <div class="col-6">
            <div class="card">
                
                <div class="card-header card-header-danger">
                    {{$act->title}}
                </div>
                <div style="display: flex;">
                    <div>
                        <img src="{{ asset('app/' . $act->image) }}" width="300" height="300">
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $act->content }}</p>
                        <a href="/actualite/{{$act->id}}" class="btn btn-primary">Lire plus</a>
                        <span>Par: {{ $act->user->firstname . ' ' . $act->user->lastname }}</span>
                        <span>Le: {{ $act->created_at->format('d/m/Y H:m') }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection