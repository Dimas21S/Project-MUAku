@props(['role'])

@php
  $logo = asset('image/MUAku-Icon-2.jpg.png');
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
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
            <li class="nav-item" style="margin-right: 100px">
              <x-nav-link href="{{ route('verified-admin') }}" :active="request()->routeIs('verified-admin')">GlamGate</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 100px">
              <x-nav-link href="{{ route('data-pelanggan') }}" :active="request()->routeIs('data-pelanggan')">ClientSphere</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 100px">
              <x-nav-link href="{{ route('vip-fitur') }}" :active="request()->routeIs('vip-fitur')">PayFlow</x-nav-link>
            </li>
            <button type="submit" class="btn btn-logout btn-outline-danger" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
            @break

          @case('makeup_artist')
            <li class="nav-item" style="margin-right: 100px">
              <x-nav-link href="{{ route('index-mua') }}" :active="request()->routeIs('index-mua')">Profil</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 100px">
              <x-nav-link href="{{ route('notif-chat') }}" :active="request()->routeIs('notif-chat')">Chat</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 100px">
              <x-nav-link href="#" :active="request()->routeIs('logout')">Logout</x-nav-link>
            </li>
            @break

          @default
            <li class="nav-item" style="margin-right: 50px">
              <x-nav-link href="{{ route('list-mua') }}" :active="request()->routeIs('list-mua')">Home</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 50px">
              <x-nav-link href="{{ route('map') }}" :active="request()->routeIs('map')">Location</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 50px">
              <x-nav-link href="{{ route('favourite') }}" :active="request()->routeIs('favourite')">Favourite</x-nav-link>
            </li>
            <li class="nav-item" style="margin-right: 50px">
              <x-nav-link href="{{ route('profile') }}" :active="request()->routeIs('profile')">Profile</x-nav-link>
            </li>
        @endswitch
      </ul>
    </div>
  </div>
</nav>
