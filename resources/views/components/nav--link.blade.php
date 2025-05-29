@props(['active']);

<li class="nav-item">
    <a class="nav-link fs-4 {{ $active ? 'active' : '' }}" aria-current="page" href="/daftar-mua">
        <i class="bi bi-house"></i>
    </a>
</li>