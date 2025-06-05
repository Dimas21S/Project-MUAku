

<a class="nav-link fs-4 {{ $active && request()->routeIs($active) ? 'active' : '' }}" aria-current="page" href="{{ $href }}">
  <i class="{{ $icon }}"></i>
</a>
