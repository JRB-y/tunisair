@extends('layouts.frontend')
@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
            <h6 class="border-bottom pb-2 mb-0 tun-red--text">Daily Flights {{ \Carbon\Carbon::today()->format('d/m/Y') }}</h6>
            <table class="table" class="display">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Numéro de vol</th>
                        <th>Escale Départ</th>
                        <th>Escale Arrivé</th>
                        <th>Etat</th>
                        <th>Départ Programmé</th>
                        <th>Arrivé Programmé</th>
                        <th>Départ Estimé</th>
                        <th>Arrivé Estimé</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flights as $flight)
                        <tr>
                            <td>{{$loop->index}}</td>
                            <td>{{$flight->num_vol}}</td>
                            <td>{{$flight->escale_depart}}</td>
                            <td>{{$flight->escale_arrive}}</td>
                            <td>
                                @if($flight->etat_vol)
                                    <i class="material-icons" style="color: green;">done_outline</i>
                                @else
                                    <i class="material-icons" style="color: red;">hide_source</i>
                                @endif
                            </td>
                            <td>{{$flight->dep_program}}</td>
                            <td>{{$flight->arr_program}}</td>
                            <td>{{$flight->dep_estime}}</td>
                            <td>{{$flight->arr_estime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('.table').DataTable();
    });
</script>
@endpush