<div>
    @if ($role == 'admin')
      <nav class="navbar fixed-bottom navbar-expand-sm" style="background-color: #332318; width: 340px; border-radius: 50px; margin-left: 40%; margin-bottom: 20px; padding: 5px 0;">
        <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav nav-brand" style="gap: 60px;">
              <li class="nav-item">
                <a class="nav-link fs-4" href="{{ route('verified-admin') }}"><i class="bi bi-person-fill-check"></i></a>
                <div class="circle-effect"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-4" aria-disabled="true"><i class="bi bi-pie-chart-fill"></i></a>
                <div class="circle-effect"></div>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-4" href="#" aria-expanded="false"><i class="bi bi-gear-fill"></i></a>
                <div class="circle-effect"></div>
              </li>
            </ul>
          </div>
        </div>
      </nav> 
    @elseif ($role == 'makeup_artist')
      <!-- Simplicity is an acquired taste. - Katharine Gerould -->
      <nav class="navbar fixed-bottom navbar-expand" style="background-color: #332318; border-radius: 50px; margin: 0 auto 20px; padding: 5px 0; max-width: 530px; width: 90%;">
          <div class="container-fluid px-0">
              <div class="navbar-collapse justify-content-center" id="navbarBottom">
                  <ul class="navbar-nav" style="gap: clamp(20px, 10vw, 60px);">
                      <li class="nav-item">
                        <x-navlink href="{{ route('home') }}" icon="bi bi-house-fill" active="home" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('address') }}" icon="bi bi-geo-alt-fill" active="address" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('history') }}" icon="bi bi-heart" active="history" />
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
    @else
    <nav class="navbar fixed-bottom navbar-expand" style="background-color: #332318; border-radius: 50px; margin: 0 auto 20px; padding: 5px 0; max-width: 530px; width: 90%;">
          <div class="container-fluid px-0">
              <div class="navbar-collapse justify-content-center" id="navbarBottom">
                  <ul class="navbar-nav" style="gap: clamp(20px, 10vw, 60px);">
                      <li class="nav-item">
                        <x-navlink href="{{ route('list-mua') }}" icon="bi bi-house" active="home" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('address') }}" icon="bi bi-geo-alt-fill" active="address" />
                      </li>
                      <li class="nav-item">
                          <x-navlink href="{{ route('history') }}" icon="bi bi-heart" active="history" />
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
      </nav>
    @endif
</div>