@extends('layouts.auth')

@section('title', 'Mon compte')

@section('content')
    <h1 class="mb-2 text-xl font-bold text-primary-dark">Bonjour {{ $user->name }} 👋</h1>
    <p class="mb-1 text-sm text-gray-600">{{ $user->email }}</p>
    <p class="mb-6 text-sm text-gray-600">Rôle : {{ $user->role }}</p>

    <p class="mb-6 rounded-lg bg-neutral-100 p-3 text-sm text-gray-500">
        Page provisoire. L'espace client complet (commandes, adresses, profil) sera construit en Phase 10.
    </p>

    @if ($user->isAdmin())
        <a href="{{ route('admin.dashboard') }}" class="btn-gold mb-3 w-full">Aller à l'administration</a>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-outline w-full">Se déconnecter</button>
    </form>
@endsection