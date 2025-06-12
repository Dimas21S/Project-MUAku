<div>
    @if ($role == 'admin')
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-2"> <!-- py-2 lebih kecil dari py-3 -->
        <div class="container">
          <a class="navbar-brand" href="#"><img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto right-navbar">
              <li class="nav-item" style="margin-right: 100px"> 
                <a class="nav-link text-black" href="{{ route('verified-admin') }}">GlamGate</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('data-pelanggan') }}">ClientSphere</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('vip-fitur') }}">PayFlow</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="{{ route('profile') }}">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @elseif ($role === 'makeup_artist')
      <nav class="navbar navbar-expand-lg py-2" style="background-color:">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto right-navbar">
              <li class="nav-item" style="margin-right: 100px"> 
                <x-nav-link href="{{ route('index-mua') }}" :active="request()->routeIs('index-mua')">Profil</x-nav-link>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <x-nav-link href="{{ route('notif-chat') }}" :active="request()->routeIs('notif-chat')">Chat</x-nav-link>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <x-nav-link href="#" :active="request()->routeIs('logout')">Logout</x-nav-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @else
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto right-navbar">
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
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</div>
