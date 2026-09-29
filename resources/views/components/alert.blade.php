@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'bg-green-50 text-green-800 ring-green-200',
        'error' => 'bg-red-50 text-red-800 ring-red-200',
        'info' => 'bg-blue-50 text-blue-800 ring-blue-200',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'rounded-lg p-4 text-sm ring-1 ' . ($styles[$type] ?? $styles['info'])]) }}>
    {{ $slot }}
</div>