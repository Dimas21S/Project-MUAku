@props([
    'value',
    'label',
    'filter' => 'location',
    'active' => false
])

<form method="GET" action="{{ route('address') }}" style="display: inline;">
    <button
        type="submit"
        class="filter-btn {{ $active ? 'active' : '' }}"
        data-filter="{{ $filter }}"
        data-value="{{ $value }}"
        name="{{ $filter }}"
        value="{{ $value }}"
        aria-label="Filter by {{ $label }}"
        {{ $attributes->merge(['class' => 'filter-btn']) }}
        onclick="this.form.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active')); this.classList.add('active');"
        {{ $attributes->except(['class', 'active']) }}
    >
        {{ $label }}
    </button>
</form>
<style>
    .filter-btn {
        padding: 6px 12px;
        font-size: 13px;
        border-radius: 20px;
        background-color: #F2E6E8;
        color: #000;
        border: none;
        cursor: pointer;
    }

    .filter-btn.active {
        background-color: #D4C0C4;
        color: #fff;
    }

    .filter-btn:hover {
        background-color: #D4C0C4;
        color: #fff;
    }
    .filter-btn:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(168, 118, 72, 0.5);
    }
    .filter-btn:active {
        transform: scale(0.98);
    }
    .filter-btn:disabled {
        background-color: #E0D5D7;
        color: #A0A0A0;
        cursor: not-allowed;
    }
    .filter-btn:disabled:hover {
        background-color: #E0D5D7;
        color: #A0A0A0;
    }
    </style>