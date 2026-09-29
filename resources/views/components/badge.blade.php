@props(['color' => 'green'])

@php
    $styles = [
        'green' => 'bg-green-100 text-green-800',
        'gold' => 'bg-amber-100 text-amber-800',
        'gray' => 'bg-gray-200 text-gray-700',
        'red' => 'bg-red-100 text-red-800',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium '.($styles[$color] ?? $styles['green'])]) }}>
    {{ $slot }}
</span>