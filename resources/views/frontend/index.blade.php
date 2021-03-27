@extends('layouts.frontend')
@push('css')
<style>
    .slider { width: 100%; padding-bottom: 25%; }
    .slider img { width: 100%; }
    .wrapper { width: 100%; margin: 0; }
    @media only screen and (min-width: 1024px) {
    .wrapper { width: 1024px; margin: auto; }
    }
</style>
@endpush
@php
    // $actualites = [];
@endphp
@section('content')
    {{-- Bloc moteur, last news --}}
    <div class="row">
        <div class="col">
            <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
                <h6 class="border-bottom pb-2 mb-0 tun-red--text">Slider</h6>
                <div style="width:100%; height: 256px; margin: 0 !important;" data-simple-slider>
                    <img src="https://picsum.photos/1200/256"/>
                    <img src="https://picsum.photos/1200/256"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 rounded">
            <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
                <h6 class="border-bottom pb-2 mb-0 tun-red--text">Bloc Moteur</h6>
                <div  style="height: 150px; background: #eee;">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
                <h6 class="border-bottom pb-2 mb-0 tun-red--text">Last news</h6>
                @if (!count($actualites))
                    <div class="text-center mt-3">
                        No news at this time, sorry!
                    </div>
                @else
                    @foreach($actualites->chunk(2) as $chunks)
                    {{-- <pre>
                        @php
                            echo $act;
                        @endphp
                    </pre> --}}
                    <div class="row">
                        @foreach($chunks as $chunk)
                            <div class="col-md-6">
                                <div class="d-flex text-muted pt-3">
                                    <img src="{{ asset('app/' . $chunk->image) }}" width="112" height="112" class="mr-2">
                                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                                        <strong class="d-block text-gray-dark">
                                            {{$chunk->title}}
                                            <small>
                                                par {{ $chunk->user->firstname . ' ' . $chunk->user->lastname }}, Le: {{ $chunk->created_at->format('d/m/Y H:m') }}
                                            </small>
                                        </strong>
                                        {{ substr($chunk->content, 0, 170) }}...
                                        <a href="{{ route('frontend.convention.show', $chunk->id) }}" class="tun-red--text">Lire la suite</a>
                                    </p>
                                </div>
                            </div>
                            @endforeach
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


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/simple-slider/1.0.0/simpleslider.min.js"></script>
<script>
    simpleslider.getSlider();
</script>
@endpush