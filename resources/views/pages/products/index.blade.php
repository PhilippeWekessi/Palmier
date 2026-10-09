@extends('layouts.app')

@section('title', 'Nos plants')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-primary-dark sm:text-3xl">Nos plants</h1>
            <p class="mt-2 text-gray-600">{{ $products->total() }} plant{{ $products->total() > 1 ? 's' : '' }} au catalogue.</p>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="flex w-full max-w-md gap-3">
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Rechercher un plant..."
                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
            <select name="sort" class="rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                <option value="">Trier par</option>
                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Nouveautés</option>
                <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
            </select>
            <button type="submit" class="btn-primary whitespace-nowrap">Rechercher</button>
        </form>
    </div>

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
</section>
@endsection