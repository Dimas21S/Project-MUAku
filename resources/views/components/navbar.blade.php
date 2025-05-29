<div>
  @auth
    @if (Auth::user()->role == 'admin')
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
    @else
      <!-- Simplicity is an acquired taste. - Katharine Gerould -->
      <nav class="navbar fixed-bottom navbar-expand" style="background-color: #332318; border-radius: 50px; margin: 0 auto 20px; padding: 5px 0; max-width: 530px; width: 90%;">
          <div class="container-fluid px-0">
              <div class="navbar-collapse justify-content-center" id="navbarBottom">
                  <ul class="navbar-nav" style="gap: clamp(20px, 10vw, 60px);">
                      <li class="nav-item">
                          <a class="nav-link fs-4" aria-current="page" href="/daftar-mua"><i class="bi bi-house"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-4" href="{{ route('address') }}"><i class="bi bi-geo-alt-fill"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-4" href="#"><i class="bi bi-heart"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-4" href="{{ route('chat.page') }}"><i class="bi bi-card-text"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-4" href="{{ route('profile') }}"><i class="bi bi-person-fill"></i></a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
    @endif
  @endauth
</div>