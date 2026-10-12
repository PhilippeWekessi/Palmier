@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary-dark focus:ring-primary',
        'gold' => 'bg-gold text-primary-dark font-semibold hover:bg-gold-light focus:ring-gold',
        'outline' => 'border border-primary text-primary hover:bg-primary hover:text-white focus:ring-primary',
        'outline-gold' => 'border border-gold text-gold hover:bg-gold hover:text-primary-dark focus:ring-gold',
        'secondary' => 'bg-neutral-100 text-gray-700 hover:bg-gray-200 focus:ring-gray-300',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    ];

    $sizes = [
        'sm' => 'rounded-md px-3 py-1.5 text-xs',
        'md' => 'rounded-lg px-5 py-2.5 text-sm',
        'lg' => 'rounded-lg px-6 py-3 text-base',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
