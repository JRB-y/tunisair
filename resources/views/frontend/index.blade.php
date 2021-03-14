@extends('layouts.frontend')
@php
    // $actualites = [];
@endphp
@section('content')
    {{-- Bloc moteur, last news --}}
    <div class="row">
        <div class="col-md-4 col-sm-12 rounded">
            <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
                <h6 class="border-bottom pb-2 mb-0 tun-red--text">Bloc Moteur</h6>
                <div  style="height: 300px; background: #eee;">

                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
                <h6 class="border-bottom pb-2 mb-0 tun-red--text">Last news</h6>
                @if (!count($actualites))
                    <div class="text-center mt-3">
                        No news at this time, sorry!
                    </div>
                @else
                
                    @foreach ($actualites as $act)
                        <div class="d-flex text-muted pt-3">
                            <img src="{{ asset('app/' . $act->image) }}" width="112" height="112" class="mr-2">

                            <p class="pb-3 mb-0 small lh-sm border-bottom">
                                <strong class="d-block text-gray-dark">
                                    {{$act->title}}
                                    <small>
                                        par {{ $act->user->firstname . ' ' . $act->user->lastname }}, Le: {{ $act->created_at->format('d/m/Y H:m') }}
                                    </small>
                                </strong>
                                {{ substr($act->content, 0, 270) }}...
                                <a href="{{ route('frontend.convention.show', $act->id) }}" class="tun-red--text">Lire la suite</a>
                            </p>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    {{-- Conventions --}}
    <div class="row mt-5 mb-5">
        @foreach ($convention_types as $type)
        <div class="col-lg-4 text-center">
            <img src="https://via.placeholder.com/150" class="rounded-circle">
            <h2>{{ strtoupper($type->name) }}</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="tun-red--text" href="{{ route('frontend.display.search', ['type' => 'convention', 'id' => $type->id ]) }}">Recherche »</a></p>
        </div>
        @endforeach
    </div>
@endsection