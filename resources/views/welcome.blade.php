@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Bienvenue sur le site de Tunisiair') }}</h1>
      </div>
  </div>
</div>
@foreach ($actualites as $act)
    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-danger">
                {{$act->title}}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $act->content }}</p>
                <a href="/actualite/{{$act->id}}" class="btn btn-primary">Lire plus</a>
                <span>Par: {{ $act->user->firstname . ' ' . $act->user->lastname }}</span>
                <span>Le: {{ $act->created_at->format('d/m/Y H:m') }}</span>
            </div>
        </div>
    </div>
@endforeach
@endsection
