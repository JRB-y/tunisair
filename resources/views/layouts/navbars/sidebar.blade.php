<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/home" class="simple-text logo-normal">
      {{ __('Tunisair') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'actualite' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('backend.actualite') }}">
          <i class="material-icons">create</i>
            <p>{{ __('News') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'employe' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('backend.employes') }}">
          <i class="material-icons">person</i>
            <p>{{ __('Employee') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'conventions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('backend.convention') }}">
          <i class="material-icons">card_giftcard</i>
            <p>{{ __('Conventions') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'banner' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('backend.banner.index') }}">
          <i class="material-icons">card_giftcard</i>
            <p>{{ __('Banners') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
