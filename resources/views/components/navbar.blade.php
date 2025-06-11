<div>
    @if ($role === 'admin')
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
                <a class="nav-link text-black" href="{{ route('index-mua') }}">Profil</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('notif-chat') }}">Chat</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="#">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @else
    {{-- <nav class="navbar fixed-bottom navbar-expand" style="background-color: #332318; border-radius: 50px; margin: 0 auto 20px; padding: 5px 0; max-width: 530px; width: 90%;">
          <div class="container-fluid px-0">
              <div class="navbar-collapse justify-content-center" id="navbarBottom">
                  <ul class="navbar-nav" style="gap: clamp(20px, 10vw, 60px);">
                      <li class="nav-item">
                        <x-navlink href="{{ route('list-mua') }}" icon="bi bi-house" active="list-mua" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('address') }}" icon="bi bi-geo-alt-fill" active="address" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('history') }}" icon="bi bi-heart-fill" active="history" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('chat.page') }}" icon="bi bi-card-text" active="chat.page" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('profile') }}" icon="bi bi-person-fill" active="profile" />
                      </li>
                  </ul>
              </div>
          </div>
      </nav> --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-2"> <!-- py-2 lebih kecil dari py-3 -->
        <div class="container">
          <a class="navbar-brand" href="#"><img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto right-navbar">
              <li class="nav-item" style="margin-right: 100px"> 
                <a class="nav-link text-black" href="{{ route('list-mua') }}">Home</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('map') }}">Location</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('history') }}">Favourite</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="{{ route('profile') }}">Profile</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @endif
</div>