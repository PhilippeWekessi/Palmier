@extends('layouts.app')

@section('title', 'Nos services')

@section('content')
<section class="bg-gradient-to-br from-primary-dark to-primary py-16 text-white sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gold-light">Nos services</p>
            <h1 class="mt-4 text-3xl font-bold sm:text-4xl">Des solutions pratiques pour chaque étape de votre plantation</h1>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach([
                ['Vente de plants', 'Des plants de qualité adaptés aux besoins des producteurs et exploitants agricoles.'],
                ['Conseils agricoles', 'Un accompagnement pour la préparation du terrain, la plantation et le suivi de votre parcelle.'],
                ['Livraison', 'Une logistique adaptée aux zones de production du Bénin.'],
                ['Service client', 'Un soutien rapide pour répondre à toutes vos questions avant et après commande.'],
            ] as [$title, $text])
                <div class="card p-6">
                    <div class="mb-4 h-12 w-12 rounded-xl bg-gold/20 text-xl flex items-center justify-center">🌿</div>
                    <h2 class="text-lg font-semibold text-primary-dark">{{ $title }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
