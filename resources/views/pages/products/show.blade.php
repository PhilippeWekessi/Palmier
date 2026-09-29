@extends('layouts.app')

@inject('site', 'App\Services\SettingsService')

@php
    $images = $product->galleryImageUrls();
    $whatsappMessage = "Bonjour, je suis intéressé(e) par : {$product->name} (réf. {$product->reference}). Est-il disponible ?";
    $whatsappUrl = $site->whatsappUrl($whatsappMessage);
@endphp

@section('title', $product->name)

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

    <nav class="mb-6 flex flex-wrap items-center gap-1 text-sm text-gray-500" aria-label="Fil d'Ariane">
        <a href="{{ route('home') }}" class="hover:text-primary">Accueil</a>
        <span aria-hidden="true">/</span>
        <a href="{{ route('products.index') }}" class="hover:text-primary">Nos plants</a>
        <span aria-hidden="true">/</span>
        <span class="text-gray-700">{{ $product->name }}</span>
    </nav>

    <div class="grid gap-10 lg:grid-cols-2">

        {{-- Galerie --}}
        <div x-data="{ active: 0, images: @js($images) }">
            <div class="aspect-[4/3] overflow-hidden rounded-card bg-primary/5 ring-1 ring-neutral-100">
                <template x-if="images.length">
                    <img :src="images[active]" alt="{{ $product->name }}" class="h-full w-full object-cover">
                </template>
                <template x-if="! images.length">
                    <div class="flex h-full w-full items-center justify-center text-6xl" aria-hidden="true">🌴</div>
                </template>
            </div>

            <div class="mt-3 grid grid-cols-5 gap-2" x-show="images.length > 1" x-cloak>
                <template x-for="(image, index) in images" :key="index">
                    <button type="button" @click="active = index"
                            class="aspect-square overflow-hidden rounded-lg ring-2 transition"
                            :class="active === index ? 'ring-primary' : 'ring-transparent opacity-70 hover:opacity-100'">
                        <img :src="image" alt="" class="h-full w-full object-cover">
                    </button>
                </template>
            </div>
        </div>

        {{-- Informations --}}
        <div>
            <div class="mb-3">
                @if (! $product->isInStock())
                    <x-badge color="gray">Épuisé</x-badge>
                @elseif ($product->isLowStock())
                    <x-badge color="gold">Stock limité — {{ $product->stock }} restant{{ $product->stock > 1 ? 's' : '' }}</x-badge>
                @else
                    <x-badge color="green">Disponible</x-badge>
                @endif
            </div>

            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
            <p class="mt-1 text-sm text-gray-500">Référence : {{ $product->reference }}</p>

            <div class="mt-4 flex flex-wrap items-baseline gap-x-3">
                <span class="text-2xl font-bold text-primary">{{ number_format((float) $product->price, 0, ',', ' ') }} FCFA</span>
                @if ($product->hasDiscount())
                    <span class="text-lg text-gray-400 line-through">{{ number_format((float) $product->old_price, 0, ',', ' ') }} FCFA</span>
                @endif
            </div>

            @if ($product->short_description)
                <p class="mt-4 leading-relaxed text-gray-600">{{ $product->short_description }}</p>
            @endif

            <dl class="mt-6 grid grid-cols-2 gap-4 rounded-lg bg-neutral-50 p-4 text-sm sm:grid-cols-3">
                @if ($product->variety)
                    <div>
                        <dt class="text-gray-500">Variété</dt>
                        <dd class="font-medium text-gray-900">{{ $product->variety }}</dd>
                    </div>
                @endif
                @if ($product->age)
                    <div>
                        <dt class="text-gray-500">Âge</dt>
                        <dd class="font-medium text-gray-900">{{ $product->age }}</dd>
                    </div>
                @endif
                @if ($product->category)
                    <div>
                        <dt class="text-gray-500">Catégorie</dt>
                        <dd class="font-medium text-gray-900">{{ $product->category->name }}</dd>
                    </div>
                @endif
            </dl>

            @if ($product->isInStock())
                <div x-data="{ qty: 1, max: {{ $product->stock }} }" class="mt-8">
                    <label for="qty" class="mb-2 block text-sm font-medium text-gray-700">Quantité</label>
                    <div class="flex items-center gap-3">
                        <div class="inline-flex items-center rounded-lg border border-gray-300">
                            <button type="button" @click="qty = Math.max(1, qty - 1)" class="px-3 py-2 text-lg text-gray-600 hover:text-primary" aria-label="Diminuer la quantité">−</button>
                            <input id="qty" type="number" x-model.number="qty" min="1" :max="max" readonly
                                   class="w-14 border-x border-gray-300 py-2 text-center focus:outline-none">
                            <button type="button" @click="qty = Math.min(max, qty + 1)" class="px-3 py-2 text-lg text-gray-600 hover:text-primary" aria-label="Augmenter la quantité">+</button>
                        </div>
                        <span class="text-sm text-gray-500">{{ $product->stock }} en stock</span>
                    </div>

                    <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                        <button type="button" disabled
                                title="Le panier sera activé dans une prochaine étape du site"
                                class="btn-primary w-full cursor-not-allowed opacity-50 sm:w-auto">
                            Ajouter au panier
                        </button>

                        @if ($whatsappUrl)
                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="btn-gold w-full sm:w-auto">
                                Commander via WhatsApp
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <div class="mt-8">
                    <p class="mb-4 text-sm text-gray-500">Ce plant est actuellement épuisé.</p>
                    @if ($whatsappUrl)
                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="btn-outline">
                            Être prévenu de la disponibilité (WhatsApp)
                        </a>
                    @endif
                </div>
            @endif

            <p class="mt-4 text-sm text-gray-500">
                Une question ?
                @if ($whatsappUrl)
                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="font-medium text-primary hover:underline">Contactez-nous sur WhatsApp</a>
                @else
                    Contactez-nous.
                @endif
            </p>
        </div>
    </div>

    @if ($product->description)
        <div class="mt-14 max-w-3xl">
            <h2 class="text-xl font-bold text-primary-dark">Description</h2>
            <div class="mt-4 leading-relaxed text-gray-700">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>
    @endif

    @if ($related->isNotEmpty())
        <div class="mt-16 border-t border-neutral-100 pt-12">
            <h2 class="text-xl font-bold text-primary-dark">Produits similaires</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($related as $item)
                    <x-product-card :product="$item" />
                @endforeach
            </div>
        </div>
    @endif

</section>
@endsection