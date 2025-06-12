@props([
  'value',
  'image',
  'label',
  'active' => false,
])

@php
    $btnClass = $active ? 'category-btn-active border-2' : 'border-0';
@endphp

<div class="col-auto mb-3 mx-3 {{ $btnClass }}">
  <button class="btn p-0 border-0 bg-transparent text-center" name="category" value="{{ $value }}">
    <div class="d-flex flex-column align-items-center">
      <img src="{{ asset($image) }}" 
           alt="{{ $label }}" 
           class="rounded-circle object-fit-cover mb-2 shadow-sm" 
           style="width: 70px; height: 70px;">
      <span class="fw-semibold {{ $active ? 'text-black fw-bold' : 'text-dark' }}">{!! $label !!}</span>
    </div>
  </button>
</div>
