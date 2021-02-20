@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __($actu->title)])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8 text-center">
          <h1 class="text-white text-center">{{ __($actu->title) }}</h1>
          <img src="{{ asset('app/' . $actu->image) }}" width="300">
          <p>
              {{ $actu->content }}
          </p>
      </div>
  </div>
</div>

@endsection
