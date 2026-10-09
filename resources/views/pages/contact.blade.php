@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-2">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Contact</p>
            <h1 class="mt-3 text-3xl font-bold text-primary-dark">Nous contacter</h1>
            <p class="mt-4 text-gray-600">Vous avez une question sur nos plants de palmier à huile, la livraison ou la plantation ? Notre équipe vous répond rapidement.</p>

            <div class="mt-8 space-y-5">
                <div>
                    <p class="text-sm font-medium text-gray-500">Téléphone</p>
                    <p class="mt-1 text-base text-gray-900">+229 01 00 00 00</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p class="mt-1 text-base text-gray-900">contact@elaeis-prestige.com</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Adresse</p>
                    <p class="mt-1 text-base text-gray-900">Bénin</p>
                </div>
            </div>
        </div>

        <div class="card p-6 sm:p-8">
            @if (session('status'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Nom complet</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                    @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                        @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="mb-1 block text-sm font-medium text-gray-700">Téléphone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                    </div>
                </div>

                <div>
                    <label for="subject" class="mb-1 block text-sm font-medium text-gray-700">Objet</label>
                    <input id="subject" name="subject" type="text" value="{{ old('subject') }}" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                </div>

                <div>
                    <label for="message" class="mb-1 block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn-primary w-full">Envoyer le message</button>
            </form>
        </div>
    </div>
</section>
@endsection
