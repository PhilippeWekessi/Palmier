@extends('layouts.auth')

@section('title', 'Nouveau mot de passe')

@section('content')
    <h1 class="mb-6 text-xl font-bold text-primary-dark">Choisir un nouveau mot de passe</h1>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <x-form-input name="email" label="Adresse e-mail" type="email" :value="$email" autocomplete="email" :required="true" />
        <x-form-input name="password" label="Nouveau mot de passe (8 caractères minimum)" type="password" autocomplete="new-password" :required="true" />
        <x-form-input name="password_confirmation" label="Confirmer le mot de passe" type="password" autocomplete="new-password" :required="true" />

        <button type="submit" class="btn-primary w-full">Enregistrer le mot de passe</button>
    </form>
@endsection