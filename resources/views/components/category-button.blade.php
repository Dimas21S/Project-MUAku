@php
    $btnClass = $active 
        ? 'border-primary border-2' 
        : 'border-0';
@endphp

<div class="col-auto mb-3 mx-3 {{ $btnClass }}">
  <button class="btn p-0 border-0 bg-transparent text-center" name="category" value="{{ $value }}">
    <div class="d-flex flex-column align-items-center">
      <img src="{{ asset($image) }}" 
          alt="{{ $label }}" 
          class="rounded-circle object-fit-cover mb-2 shadow-sm" 
          style="width: 70px; height: 70px; object-fit: cover;">
      <span class="fw-semibold text-dark {{ $active ? 'text-primary' : 'text-dark' }}">{!! $label !!}</span>
    </div>
  </button>
</div>