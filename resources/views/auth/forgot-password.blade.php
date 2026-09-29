@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

@section('content')
    <h1 class="mb-2 text-xl font-bold text-primary-dark">Mot de passe oublié</h1>
    <p class="mb-6 text-sm text-gray-600">
        Saisissez votre adresse e-mail : nous vous enverrons un lien pour choisir un nouveau mot de passe.
    </p>

    @if (session('dev_reset_link'))
        <x-alert type="info" class="mb-4 break-all">
            Mode local — lien de test :
            <a href="{{ session('dev_reset_link') }}" class="font-medium underline">Réinitialiser maintenant</a>
        </x-alert>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <x-form-input name="email" label="Adresse e-mail" type="email" autocomplete="email" :required="true" />

        <button type="submit" class="btn-primary w-full">Envoyer le lien</button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
        <a href="{{ route('login') }}" class="font-medium text-primary hover:underline">Retour à la connexion</a>
    </p>
@endsection