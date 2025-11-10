@props(['role'])

@php
  $logo = asset('image/logo_bulat_MUA.png');
@endphp

<style>
  /* === General Navbar Styles === */
  .navbar {
    font-size: 18px;
    font-family: 'Poppins', sans-serif;
  }

  .navbar .nav-link {
    font-size: 18px;
    color: inherit !important;
    transition: color 0.2s, border-bottom 0.2s;
  }

  .navbar .nav-link.active {
    font-weight: 600;
    border-bottom: 2px solid currentColor;
  }

  .navbar .btn-logout {
    font-size: 18px;
    border: none;
    background: transparent;
    padding: 0;
    margin-left: 10px;
    transition: opacity 0.2s;
  }

  .navbar .btn-logout:hover {
    opacity: 0.7;
  }

  /* === Default Navbar === */
  .navbar-default {
    background-color: white;
    color: black;
  }

  .navbar-default .btn-logout {
    color: black;
  }

  /* === MUA Navbar === */
  .navbar-mua {
    background: #E4CFCE;
    color: black;
    transition: background-color 0.3s ease-in-out;
  }

  .navbar-mua .nav-link.active {
    border-bottom: 2px solid white;
  }

  .navbar-mua .btn-logout {
    color: white;
  }

  /* Navbar brand style */
  .navbar-brand {
    color: #A87648;
    text-decoration: none;
    font-size: 32px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .navbar-brand img {
    width: 84px;
    height: 78px;
    object-fit: cover;
  }
</style>

<nav class="navbar navbar-expand-lg py-2 {{ $role === 'makeup_artist' ? 'navbar-mua' : 'navbar-default' }}">
  <div class="container">
    <a class="navbar-brand" href="#" style="text-decoration: none; color: #A87648">
      <img src="{{ $logo }}" alt="Logo" />
      pakaimua
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        @switch($role)
          @case('admin')
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('verified-admin') }}" :active="request()->routeIs('verified-admin')">
                GlamGate
              </x-nav-link>
            </li>
            <button type="button" class="btn btn-logout text-danger" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
              Logout
            </button>
            @break

          @case('makeup_artist')
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('index-mua') }}" :active="request()->routeIs('index-mua')">
                Profil
              </x-nav-link>
            </li>
            <li class="nav-item me-4">
              <x-nav-link href="{{ route('notif-chat') }}" :active="request()->routeIs('notif-chat')">
                Chat
              </x-nav-link>
            </li>
            <button type="button" class="btn btn-logout text-danger" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
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
