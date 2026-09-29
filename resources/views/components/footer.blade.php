@inject('site', 'App\Services\SettingsService')
@php
    // Petite requête de lecture ; sera mise en cache en Phase 14 (optimisation).
    $footerCategories = \App\Models\Category::active()->orderBy('name')->get(['id', 'name', 'slug']);
    $phone = $site->get('phone');
    $email = $site->get('email');
    $whatsappUrl = $site->whatsappUrl();
@endphp

<footer class="bg-primary-dark text-green-100/80">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Marque --}}
            <div>
                <p class="flex items-center gap-2 text-lg font-bold text-white"><span aria-hidden="true">🌴</span> {{ $site->get('company_name') }}</p>
                <p class="mt-3 text-sm leading-relaxed">
                    Vente et distribution de plants de palmier à huile pour les agriculteurs, producteurs et particuliers du Bénin.
                </p>
                <div class="mt-4 flex gap-4 text-sm">
                    @if ($site->get('facebook_url'))
                        <a href="{{ $site->get('facebook_url') }}" target="_blank" rel="noopener" class="hover:text-gold-light">Facebook</a>
                    @endif
                    @if ($site->get('instagram_url'))
                        <a href="{{ $site->get('instagram_url') }}" target="_blank" rel="noopener" class="hover:text-gold-light">Instagram</a>
                    @endif
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-white">Navigation</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-gold-light">Accueil</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-gold-light">Nos plants</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-gold-light">À propos</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-gold-light">Nos services</a></li>
                    <li><a href="{{ route('posts.index') }}" class="hover:text-gold-light">Conseils agricoles</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-gold-light">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-gold-light">Contact</a></li>
                </ul>
            </div>

            {{-- Produits --}}
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-white">Nos produits</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    @foreach ($footerCategories as $category)
                        <li><a href="{{ route('products.index', ['category' => $category->slug]) }}" class="hover:text-gold-light">{{ $category->name }}</a></li>
                    @endforeach
                    <li><a href="{{ route('products.index') }}" class="hover:text-gold-light">Tous les plants</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-white">Contact</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    @if ($phone)
                        <li>Téléphone : <a href="{{ $site->telUrl() }}" class="hover:text-gold-light">{{ $phone }}</a></li>
                    @endif
                    @if ($whatsappUrl)
                        <li>WhatsApp : <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="hover:text-gold-light">Nous écrire</a></li>
                    @endif
                    @if ($email)
                        <li>E-mail : <a href="mailto:{{ $email }}" class="break-all hover:text-gold-light">{{ $email }}</a></li>
                    @endif
                    @if ($site->get('address'))
                        <li>{{ $site->get('address') }}</li>
                    @endif
                    @if ($site->get('opening_hours'))
                        <li>{{ $site->get('opening_hours') }}</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-3 border-t border-white/10 pt-6 text-sm sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ now()->year }} Elaeis Prestige. Tous droits réservés.</p>
            <div class="flex gap-5">
                <a href="{{ route('terms') }}" class="hover:text-gold-light">Conditions générales</a>
                <a href="{{ route('privacy') }}" class="hover:text-gold-light">Confidentialité</a>
            </div>
        </div>
    </div>
</footer>