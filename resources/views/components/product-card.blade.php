@props(['product'])

@php
    $image = $product->image ? asset('storage/'.$product->image) : null;
    $details = collect([$product->variety, $product->age])->filter()->implode(' · ');
@endphp

<article class="card group flex flex-col overflow-hidden">
    <a href="{{ route('products.show', $product) }}" class="relative block aspect-[4/3] overflow-hidden bg-primary/5">
        @if ($image)
            <img src="{{ $image }}" alt="{{ $product->name }}" loading="lazy"
                 class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
        @else
            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-primary-light/20 to-gold/20 text-5xl" aria-hidden="true">🌴</div>
        @endif

        <div class="absolute left-3 top-3">
            @if (! $product->isInStock())
                <x-badge color="gray">Épuisé</x-badge>
            @elseif ($product->isLowStock())
                <x-badge color="gold">Stock limité</x-badge>
            @else
                <x-badge color="green">Disponible</x-badge>
            @endif
        </div>
    </a>

    <div class="flex flex-1 flex-col p-5">
        <h3 class="text-base font-semibold leading-snug text-gray-900">
            <a href="{{ route('products.show', $product) }}" class="hover:text-primary">{{ $product->name }}</a>
        </h3>

        @if ($details)
            <p class="mt-1 text-sm text-gray-500">{{ $details }}</p>
        @endif

        <div class="mt-3 flex flex-wrap items-baseline gap-x-2">
            <span class="whitespace-nowrap text-lg font-bold text-primary">{{ number_format((float) $product->price, 0, ',', ' ') }} FCFA</span>
            @if ($product->hasDiscount())
                <span class="whitespace-nowrap text-sm text-gray-400 line-through">{{ number_format((float) $product->old_price, 0, ',', ' ') }} FCFA</span>
            @endif
        </div>

        <a href="{{ route('products.show', $product) }}" class="btn-outline mt-auto w-full">Voir le produit</a>
    </div>
</article>