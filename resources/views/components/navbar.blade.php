@props(['role'])

@php
  $logo = asset('image/MUAku-Icon-2.jpg.png');
@endphp

<!-- Custom Navbar Styles -->
<style>
  /* Default Navbar */
  .navbar-default {
    background-color: white;
    color: black;
  }

  .navbar-default .nav-link {
    color: black !important;
  }

  .navbar-default .nav-link.active {
    font-weight: bold;
    border-bottom: 2px solid black;
  }

  .navbar-default .btn-logout {
    border-color: black;
    color: black;
  }

  .navbar-default .btn-logout:hover {
    background-color: rgba(0, 0, 0, 0.1);
  }

  /* MakeUp Artist Navbar */
  .navbar-mua {
    background: #E4CFCE;
    color: white;
    transition: background-color 0.3s ease-in-out;
  }

  .navbar-mua .nav-link.active {
    border-bottom: 2px solid white;
  }

  .navbar-mua .btn-logout {
    border-color: white;
    color: white;
  }

  .navbar-mua .btn-logout:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }
</style>

<nav class="navbar navbar-expand-lg py-2 {{ $role === 'makeup_artist' ? 'navbar-mua' : 'navbar-default' }}">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ $logo }}" style="width: 130px; height: 60px; object-fit:cover;" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto right-navbar">
        @switch($role)
          @case('admin')
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('verified-admin') }}" :active="request()->routeIs('verified-admin')">GlamGate</x-nav-link>
            </li>
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('data-pelanggan') }}" :active="request()->routeIs('data-pelanggan')">ClientSphere</x-nav-link>
            </li>
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('vip-fitur') }}" :active="request()->routeIs('vip-fitur')">PayFlow</x-nav-link>
            </li>
            <button type="submit" class="btn btn-logout text-danger border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
              Logout
            </button>
            @break

          @case('makeup_artist')
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('index-mua') }}" :active="request()->routeIs('index-mua')">Profil</x-nav-link>
            </li>
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('notif-chat') }}" :active="request()->routeIs('notif-chat')">Chat</x-nav-link>
            </li>
            <button type="submit" class="btn btn-logout text-danger border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
              Logout
            </button>
            @break

          @default
            <li class="nav-item me-3">
              <x-nav-link href="{{ route('list-mua') }}" :active="request()->routeIs('list-mua')">Home</x-nav-link>
            </li>
            <li class="nav-item me-3">
              <x-nav-link href="{{ route('map') }}" :active="request()->routeIs('map')">Location</x-nav-link>
            </li>
            <li class="nav-item me-3">
              <x-nav-link href="{{ route('favourite') }}" :active="request()->routeIs('favourite')">Favourite</x-nav-link>
            </li>
            <li class="nav-item me-3">
              <x-nav-link href="{{ route('profil') }}" :active="request()->routeIs('profil')">Profil</x-nav-link>
            </li>
        @endswitch
      </ul>
    </div>
  </div>
</nav>
