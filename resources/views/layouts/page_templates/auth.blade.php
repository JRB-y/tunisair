<div class="wrapper ">
    @include('layouts.navbars.sidebar')
    <div class="main-panel">
        @include('layouts.navbars.navs.auth')
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 99999;">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @yield('content')
  </div>
</div>