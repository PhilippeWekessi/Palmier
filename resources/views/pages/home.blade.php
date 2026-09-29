@extends('layouts.app')

@inject('site', 'App\Services\SettingsService')

@php
    $heroImage = file_exists(public_path('images/hero-plantation.jpg')) ? asset('images/hero-plantation.jpg') : null;
    $whatsappUrl = $site->whatsappUrl('Bonjour, je souhaite des informations sur vos plants de palmier à huile.');
@endphp

@section('content')

{{-- ========== HERO ========== --}}
<section class="relative isolate overflow-hidden bg-primary-dark">
    @if ($heroImage)
        <img src="{{ $heroImage }}" alt="Plantation de palmiers à huile" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-primary-dark/95 via-primary-dark/75 to-primary-dark/30"></div>
    @else
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-primary-dark via-primary to-primary-light"></div>
    @endif

    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-28 lg:px-8 lg:py-36">
        <div class="max-w-2xl">
            <p class="mb-4 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-sm font-medium text-gold-light ring-1 ring-white/20">
                🌴 Plants de palmier à huile · Bénin
            </p>
            <h1 class="text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">{{ $site->get('hero_title') }}</h1>
            <p class="mt-5 text-base text-green-50/90 sm:text-lg">{{ $site->get('hero_subtitle') }}</p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="#nos-plants" class="btn-gold px-6 py-3">Découvrir nos plants</a>
                <a href="{{ route('products.index') }}" class="btn border border-white/60 px-6 py-3 text-white hover:bg-white hover:text-primary-dark">Commander maintenant</a>
            </div>

            @if ($whatsappUrl)
                <p class="mt-6 text-sm text-green-100/90">
                    Une question ?
                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="font-semibold underline underline-offset-4 hover:text-white">Écrivez-nous sur WhatsApp</a>
                </p>
            @endif
        </div>
    </div>
</section>

{{-- ========== SECTION 1 : NOS PLANTS ========== --}}
<section id="nos-plants" class="scroll-mt-20 bg-neutral-50 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-primary-dark sm:text-3xl">Nos plants</h2>
                <p class="mt-2 text-gray-600">Variété, âge, prix et disponibilité : tout est indiqué avant de commander.</p>
            </div>
            <a href="{{ route('products.index') }}" class="font-medium text-primary hover:underline">Voir tous les plants →</a>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <p class="col-span-full rounded-lg bg-white p-8 text-center text-gray-500 ring-1 ring-neutral-100">
                    Le catalogue est en cours de préparation. Revenez très bientôt.
                </p>
            @endforelse
        </div>
    </div>
</section>

{{-- ========== SECTION 2 : POURQUOI NOUS CHOISIR ========== --}}
<section class="py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-2xl font-bold text-primary-dark sm:text-3xl">Pourquoi choisir Elaeis Prestige ?</h2>
            <p class="mt-2 text-gray-600">Un partenaire à vos côtés, de la commande à la plantation.</p>
        </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        ['Plants de qualité', 'Des plants sélectionnés avec soin pour démarrer votre plantation dans de bonnes conditions.'],
                        ['Accompagnement agricole', "Des conseils pratiques sur la préparation du terrain, la plantation et l'entretien de votre parcelle."],
                        ['Livraison', "Livraison dans les principales villes du Bénin, avec frais et délais annoncés avant la commande."],
                        ['Service client', 'Une équipe joignable par téléphone et WhatsApp pour répondre à vos questions.'],
                    ] as [$title, $text])
                        <div class="card p-6">
                            <div class="mb-4 h-1 w-10 rounded-full bg-gold"></div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ $text }}</p>
                        </div>
                    @endforeach
                </div>
    </div>
</section>

{{-- ========== SECTION 3 : COMMENT COMMANDER ========== --}}
<section class="bg-neutral-100 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-2xl font-bold text-primary-dark sm:text-3xl">Comment commander ?</h2>
            <p class="mt-2 text-gray-600">Quatre étapes simples.</p>
        </div>

        <ol class="mt-12 grid gap-8 md:grid-cols-4">
            @foreach ([
                ['Choisissez vos plants', 'Parcourez le catalogue et comparez variétés, âges et prix.'],
                ['Ajoutez-les au panier', 'Indiquez la quantité souhaitée, selon le stock disponible.'],
                ['Confirmez votre commande', 'Renseignez vos coordonnées et votre zone de livraison.'],
                ['Recevez vos plants', "Nous vous livrons à l'adresse indiquée."],
            ] as $index => [$title, $text])
                <li class="text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gold text-xl font-bold text-primary-dark shadow-sm">{{ $index + 1 }}</div>
                    <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $title }}</h3>
                    <p class="mt-2 text-sm text-gray-600">{{ $text }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ========== SECTION 4 : NOS ENGAGEMENTS ========== --}}
<section class="bg-primary-dark py-16 text-white sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-2xl font-bold sm:text-3xl">Nos engagements</h2>
            <p class="mt-2 text-green-100/80">Ce que vous pouvez attendre de nous.</p>
        </div>

        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['Qualité', 'Nous sélectionnons nos plants avec exigence.'],
                ['Transparence', 'Prix, stock et frais de livraison affichés clairement avant de commander.'],
                ['Accompagnement', 'Des conseils pour réussir la plantation et l\'entretien de votre parcelle.'],
                ['Satisfaction client', 'Nous restons à votre écoute avant, pendant et après votre commande.'],
            ] as [$title, $text])
                <div class="border-l-2 border-gold pl-5">
                    <h3 class="text-lg font-semibold text-gold-light">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-green-100/80">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 5 : TÉMOIGNAGES (base de données) ========== --}}
@if ($reviews->isNotEmpty())
    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-2xl font-bold text-primary-dark sm:text-3xl">Témoignages clients</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($reviews as $review)
                    <figure class="card flex flex-col p-6">
                        <div class="text-lg" role="img" aria-label="Note : {{ $review->rating }} sur 5">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $review->rating ? 'text-gold' : 'text-gray-300' }}">★</span>
                            @endfor
                        </div>
                        <blockquote class="mt-4 flex-1 text-sm leading-relaxed text-gray-700">« {{ $review->comment }} »</blockquote>
                        <figcaption class="mt-5 text-sm font-semibold text-primary-dark">{{ $review->user->name }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- ========== SECTION 6 : CONSEILS AGRICOLES (base de données) ========== --}}
@if ($posts->isNotEmpty())
    <section class="bg-neutral-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-primary-dark sm:text-3xl">Conseils agricoles</h2>
                    <p class="mt-2 text-gray-600">Nos derniers articles pour réussir votre plantation.</p>
                </div>
                <a href="{{ route('posts.index') }}" class="font-medium text-primary hover:underline">Tous les conseils →</a>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="card group flex flex-col overflow-hidden">
                        <a href="{{ route('posts.show', $post) }}" class="block aspect-[16/9] overflow-hidden bg-primary/5">
                            @if ($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" loading="lazy"
                                     class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-primary-light/20 to-gold/20 text-4xl" aria-hidden="true">🌿</div>
                            @endif
                        </a>
                        <div class="flex flex-1 flex-col p-5">
                            <p class="text-xs text-gray-500">{{ $post->published_at?->locale('fr')->translatedFormat('d F Y') }}</p>
                            <h3 class="mt-2 text-base font-semibold leading-snug text-gray-900">
                                <a href="{{ route('posts.show', $post) }}" class="hover:text-primary">{{ $post->title }}</a>
                            </h3>
                            <p class="mt-2 flex-1 text-sm text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 130) }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="mt-4 text-sm font-medium text-primary hover:underline">Lire l'article →</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- ========== SECTION 7 : CTA FINAL ========== --}}
<section class="bg-gradient-to-br from-primary to-primary-dark py-16 text-center text-white sm:py-20">
    <div class="mx-auto max-w-3xl px-4">
        <h2 class="text-2xl font-bold sm:text-3xl">Préparez votre prochaine plantation</h2>
        <p class="mt-3 text-green-50/90">Choisissez vos plants, commandez en ligne et faites-vous livrer.</p>
        <a href="{{ route('products.index') }}" class="btn-gold mt-8 px-8 py-3">Commander vos plants</a>
    </div>
</section>

@endsection