@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<section class="py-16 sm:py-20">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">FAQ</p>
            <h1 class="mt-4 text-3xl font-bold text-primary-dark sm:text-4xl">Questions fréquentes</h1>
        </div>

        <div class="mt-12 space-y-5">
            @foreach([
                ['Quels types de plants proposez-vous ?', 'Nous proposons des plants de palmier à huile adaptés aux besoins des agriculteurs, producteurs et particuliers, avec une sélection orientée vers la qualité et le bon développement.'],
                ['Comment passer une commande ?', 'Choisissez le produit, ajoutez-le au panier, renseignez vos informations de livraison et confirmez votre commande.'],
                ['Livrez-vous partout au Bénin ?', 'Oui, nous travaillons avec des zones de livraison dans plusieurs localités du Bénin selon les disponibilités et les frais de livraison.'],
                ['Puis-je recevoir des conseils avant plantation ?', 'Oui, notre équipe peut vous orienter sur la préparation du terrain, le choix du plant et la réussite de la plantation.'],
            ] as [$question, $answer])
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-primary-dark">{{ $question }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ $answer }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
