@extends('layouts.app')

@section('title', 'Nos plants')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-primary-dark sm:text-3xl">Nos plants</h1>
        <p class="mt-2 text-gray-600">{{ $products->total() }} plant{{ $products->total() > 1 ? 's' : '' }} au catalogue.</p>
    </div>

    <div x-data="{ filtersOpen: false }" class="lg:grid lg:grid-cols-4 lg:gap-8">

        {{-- Bouton filtres mobile --}}
        <div class="mb-4 lg:hidden">
            <button type="button" @click="filtersOpen = !filtersOpen" class="btn-outline w-full justify-center">
                Filtrer et trier
            </button>
        </div>

        {{-- Filtres --}}
        <aside x-cloak :class="filtersOpen ? 'block' : 'hidden'" class="mb-8 lg:col-span-1 lg:mb-0 lg:block">
            <form method="GET" action="{{ route('products.index') }}" class="card space-y-6 p-5">

                <div>
                    <label for="q" class="mb-1 block text-sm font-medium text-gray-700">Rechercher</label>
                    <input type="search" id="q" name="q" value="{{ request('q') }}" placeholder="Nom, référence, variété…"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                </div>

                <div>
                    <span class="mb-2 block text-sm font-medium text-gray-700">Catégorie</span>
                    <div class="space-y-1.5">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="radio" name="category" value="" class="text-primary focus:ring-primary-light" {{ request('category') ? '' : 'checked' }}>
                            Toutes les catégories
                        </label>
                        @foreach ($categories as $category)
                            <label class="flex items-center gap-2 text-sm text-gray-600">
                                <input type="radio" name="category" value="{{ $category->slug }}" class="text-primary focus:ring-primary-light" {{ request('category') === $category->slug ? 'checked' : '' }}>
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                @if ($varieties->isNotEmpty())
                    <div>
                        <label for="variety" class="mb-1 block text-sm font-medium text-gray-700">Variété</label>
                        <select id="variety" name="variety" class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                            <option value="">Toutes les variétés</option>
                            @foreach ($varieties as $variety)
                                <option value="{{ $variety }}" {{ request('variety') === $variety ? 'selected' : '' }}>{{ $variety }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div>
                    <span class="mb-2 block text-sm font-medium text-gray-700">Prix (FCFA)</span>
                    <div class="flex items-center gap-2">
                        <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min" min="0"
                               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                        <span class="text-gray-400">–</span>
                        <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max" min="0"
                               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                    </div>
                </div>

                <div>
                    <label class="flex items-center gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="availability" value="in_stock" class="rounded text-primary focus:ring-primary-light" {{ request('availability') === 'in_stock' ? 'checked' : '' }}>
                        En stock uniquement
                    </label>
                </div>

                <div>
                    <label for="sort" class="mb-1 block text-sm font-medium text-gray-700">Trier par</label>
                    <select id="sort" name="sort" class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                        <option value="">Pertinence</option>
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Nouveautés</option>
                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <button type="submit" class="btn-primary w-full">Appliquer</button>
                    @if (request()->anyFilled(['q', 'category', 'variety', 'price_min', 'price_max', 'availability', 'sort']))
                        <a href="{{ route('products.index') }}" class="text-center text-sm text-gray-500 hover:text-primary hover:underline">Effacer les filtres</a>
                    @endif
                </div>
            </form>
        </aside>

        {{-- Résultats --}}
        <div class="lg:col-span-3">
            @if ($products->isEmpty())
                <div class="card p-10 text-center">
                    <p class="text-gray-600">Aucun plant ne correspond à votre recherche.</p>
                    <a href="{{ route('products.index') }}" class="mt-4 inline-block text-primary hover:underline">Voir tous les plants</a>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection