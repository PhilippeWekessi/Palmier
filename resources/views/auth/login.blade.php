@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')
    <h1 class="mb-6 text-xl font-bold text-primary-dark">Connexion</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <x-form-input name="email" label="Adresse e-mail" type="email" autocomplete="email" :required="true" />
        <x-form-input name="password" label="Mot de passe" type="password" autocomplete="current-password" :required="true" />

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary focus:ring-primary-light">
                Se souvenir de moi
            </label>
            <a href="{{ route('password.request') }}" class="text-primary hover:underline">Mot de passe oublié ?</a>
        </div>

        <button type="submit" class="btn-primary w-full">Se connecter</button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
        Pas encore de compte ?
        <a href="{{ route('register') }}" class="font-medium text-primary hover:underline">Créer un compte</a>
    </p>
@endsection