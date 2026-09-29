@extends('layouts.auth')

@section('title', 'Inscription')

@section('content')
    <h1 class="mb-6 text-xl font-bold text-primary-dark">Créer un compte</h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <x-form-input name="name" label="Nom complet" autocomplete="name" :required="true" />
        <x-form-input name="email" label="Adresse e-mail" type="email" autocomplete="email" :required="true" />
        <x-form-input name="phone" label="Téléphone" type="tel" autocomplete="tel" :required="true" />
        <x-form-input name="password" label="Mot de passe (8 caractères minimum)" type="password" autocomplete="new-password" :required="true" />
        <x-form-input name="password_confirmation" label="Confirmer le mot de passe" type="password" autocomplete="new-password" :required="true" />

        <button type="submit" class="btn-primary w-full">Créer mon compte</button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
        Déjà inscrit ?
        <a href="{{ route('login') }}" class="font-medium text-primary hover:underline">Se connecter</a>
    </p>
@endsection