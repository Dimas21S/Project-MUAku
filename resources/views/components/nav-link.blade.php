@props(['href', 'active' => false, 'icon' => null])

@php
    $classes = $active
        ? 'nav-link text-black border-bottom border-2 border-dark fw-bold'
        : 'nav-link text-black';
@endphp

<a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>