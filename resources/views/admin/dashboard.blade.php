@extends('layouts.auth')

@section('title', 'Administration')

@section('content')
    <h1 class="mb-2 text-xl font-bold text-primary-dark">Administration</h1>
    <p class="mb-6 text-sm text-gray-600">Connecté en tant que {{ auth()->user()->name }}.</p>

    <p class="mb-6 rounded-lg bg-neutral-100 p-3 text-sm text-gray-500">
        Page provisoire. Le vrai dashboard sera construit en Phase 11.
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-outline w-full">Se déconnecter</button>
    </form>
@endsection