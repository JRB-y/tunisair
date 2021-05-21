@extends('layouts.frontend', ['page_title' => 'home'])

@section('content')
<div class="container" style="margin-top: 120px; margin-bottom: 120px;">
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
    
            @if (intval($type->id) === 3)
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="specialite">Speciality</label>
                            <select name="doctor_speciality" class="form-control">
                                <option value="all">All</option>
                                @foreach($specialites as $spec) 
                                    <option value="{{$spec}}">{{$spec}}</option>
                                @endforeach
                            </select>
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
         <div class="row" style="width: 65%; margin: auto;">
            <div class="list-content clearfix">
                @foreach ($results as $rsl)

                    <div class="list-item-entry">
                        <div class="hotel-item style-3 bg-white">
                            <div class="table-view">
                                <div class="radius-top cell-view">
                                    <img src="{{ asset('app/' . $rsl->image) }}" style="width: 112px !important; height: 112px !important;">
                                </div>
                                <div class="title hotel-middle clearfix cell-view">
                                    <div class="date list-hidden"></div>
                                    <div class="date grid-hidden"><strong>{{ $rsl->address . ' ' . $rsl->city }}</strong></div>
                                    <h4><b>{{ $rsl->name }}</b></h4>
                                    <p class="f-14 grid-hidden">Nunc cursus libero purus ac congue arcu cur sus ut sed vitae pulvinar. Nunc cursus libero purus ac congue arcu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
    @endif
</div>
@endsection

